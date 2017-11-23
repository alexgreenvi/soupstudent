// - coreJs -
var coreJs = {
    menu: $('.core__menu-nav__ul'),
    width: null,

    init: function () {
        this.resize();
    },
    active: function ($this) {
        $this.addClass('active');
    },
    activeRemove: function ($this) {
        $this.removeClass('active');
    },
    activeToggle: function ($this){
        $this.toggleClass('active');
    },
    delete: function ($this) {
        $this.remove();
    },
    resize: function () {
        coreJs.width = $(document).width();

        $(window).resize(function () {
            coreJs.width = $(document).width();
        });
    },
    put: function ($element,$to) {
        $element.detach();
        $to.append($element);
    }
};
var coreJsResize = {
    // Переменные
    // ...
    $arElements : $('[data-js-core-resize]'),
    width : null,

    //...
    init: function () {
        this.load();
    },
    load: function () {
        // Переменные
        this.$arElements.each(function () {
            var $this = $(this),
                $name = $this.data('js-core-resize'),
                $size = $this.data('js-core-resize-width');

            $this.data({
                status: false,
                name:   $name,
                size:   $size,
                before: $('[data-js-core-resize=' + $name + ']'),
                after:  $('[data-js-core-resize-after=' + $name + ']'),
            });

            //$this.children().addClass('js-core-resize-element');
        });
        this.resize();
        $(window).resize(this.resize);
    },
    resize: function() {
        coreJsResize.$arElements.each(function () {
            var $this = $(this);

            if($this.data().size === 'xl') $this.data().size = '1200';
            if($this.data().size === 'lg') $this.data().size = '992';
            if($this.data().size === 'md') $this.data().size = '758';
            if($this.data().size === 'sm') $this.data().size = '576';
            if($this.data().size === 'xs') $this.data().size = '360';


            if(coreJs.width <= $this.data().size){
                if(!$this.data().status) {
                    console.log('перенос');
                    $this.wrap('<div data-js-core-resize-before="' + $this.data().name + '"></div>');
                    $this.data().before = $('[data-js-core-resize-before=' + $this.data().name + ']');
                    $this.data().before.css('display','none');
                    coreJs.put(
                        $this,
                        $this.data().after
                    );
                    $this.data().status = true;
                }
            }else{
                if($this.data().status) {
                    console.log('Возврат');
                    coreJs.put(
                        $this.data().after.find('[data-js-core-resize=' + $this.data().name + ']'),
                        $this.data().before
                    );
                    $this.unwrap();

                    $this.data().status = false;
                }
            }
        });
    }
};
var coreJsFormCheckbox = {
    // Переменные
    // ...
    $arElements : $('[data-js-core-form-checkbox]'),
    //...
    init: function () {
        this.load();
    },
    load: function () {
        // Переменные
        this.$arElements.each(function () {
            var $this = $(this),
                $name = $this.data('js-core-form-checkbox');

            $this.data({
                hidden:     $('.' + $name)
            });
        });
        this.activation();
    },
    activation: function() {
        this.$arElements.each(function () {
            var $this = $(this);

            $($this).on('click', function(){
                $this.data().hidden.toggleClass('active');
            });
        });
    }
};
var coreJsTabs = {
    // Переменные
    // ...
    $arElementsNav : $('[data-js-core-tabs-nav]').find('a'),
    $arElementsTabs : $('[data-js-core-tabs]'),
    id : 1,
    num: null,
    //...
    init: function () {
        this.load();
    },
    load: function () {
        // Переменные
        var tempLastName = null;

        this.$arElementsNav.each(function () {
            var $this = $(this),
                id    = null,
                $name = $this.parents('[data-js-core-tabs-nav]').data('js-core-tabs-nav');

            if($this.data('js-core-tabs-nav-id')) {
                id = $this.data('js-core-tabs-nav-id');
            }else{
                id = coreJsTabs.id
            }

            // Для переключения
            if(tempLastName === $name) {
                coreJsTabs.num += 1;
            }else{
                tempLastName = $name;
                coreJsTabs.num = 1;
            }

            var $tab = coreJsTabs.$arElementsTabs.find('[data-js-core-tabs-id ='+ id + ']');

            $this.data({
                id:         id,
                name:       $name,
                tab:        $tab,
                num:        coreJsTabs.num
            });
            coreJsTabs.id += 1;
        });

        this.activation();
    },
    activation: function() {
        this.$arElementsNav.each(function () {
            var $this = $(this);

            $($this).on('click', function(e){
                e.preventDefault();
                // nav
                $('[data-js-core-tabs-nav=' + $this.data().name + ']').find('[data-js-core-tabs-nav-id]').removeClass('active');
                $this.toggleClass('active');
                // tab
                $('[data-js-core-tabs=' + $this.data().name + ']').find('[data-js-core-tabs-id]').removeClass('active');
                $this.data().tab.toggleClass('active');

                var JSarray = anime({
                    targets: $('[data-js-core-tabs=' + $this.data().name + ']').find('[data-js-core-tabs-id]'),
                    translateX: 250
                });
            });
        });
    }
};
var coreJsMobile = {
    // Переменные
    // ...
    $body :    $('.body-content'),
    $menu :    $('.core__mobile__menu'),
    $buttonX : $('.core__mobile__button'),

    init: function () {
        this.load();
    },
    load: function () {
        $(this.$buttonX).on('click', this.ButtonX_click);
    },

    ButtonX_click: function (e){
        e.preventDefault();
        coreJsMobile.$body.toggleClass('js-core-mobile-open');
        coreJsMobile.$buttonX.toggleClass('active');
        $('.core__mobile').removeClass('js-list');
    }
};
var coreJsSwitchElement = {
    // Переменные
    // ...
    $arElements : $('[data-js-core-switch-element]'),
    //...
    init: function () {
        this.load();
    },
    load: function () {
        // Обработка DATA
        this.$arElements.each(function () {
            var $this = $(this),
                $name = $this.data('js-core-switch-element'),
                $text = $this.text();
            $textSwitch = $this.data('js-core-switch-element-text')

            $this.data({
                element:     $('.' + $name),
                text:        $text,
                textSwitch:  $textSwitch
            });
        });
        this.activation();
    },
    activation: function() {
        this.$arElements.each(function () {
            var $this = $(this);
            $($this).on('click', function(){
                $this.data('element').toggleClass('active');

                if(!!$this.data('textSwitch') && $this.data('element').hasClass('active')){
                    $this.text($this.data('textSwitch'));
                }else {
                    $this.text($this.data('text'));
                }
            });
        });
    }
};
var coreJSFixed = {
    init: function () {
        this.window = $(window);
        // .....
        this.$arElements = $('[data-js-fixed]');
        // .....
        if(this.$arElements.length) {
            this.load();
        }
    },
    load: function () {
        this.$arElements.each(function () {
            var $this = $(this),
                top = $this.offset().top;

            $this.data({
                status:    false,
                top:       top
            });
        });
        this.activation();
    },
    activation: function () {
        coreJSFixed.window.scroll(function() {
            coreJSFixed.$arElements.each(function () {
                var $this = $(this);
                if (coreJSFixed.window.scrollTop() > $this.data('top')) {
                    $this.addClass('fixed');
                } else {
                    $this.removeClass('fixed');
                }
            });
        });
    }
};

var Assess = {
    core: null,

    init: function () {
        // Константа core, чтобы все было проще
        core = $.extend(true, {} , this);
        // .....
        this.load();
    },
    load: function () {
        this.$add      = $('.rating__add');
        this.$arResult = $('[data-js-assess]');

        this.$arResult.each(function () {
            var $this = $(this);
            $this.data({
                table   : $this.data('js-assess'),
                id      : $this.data('js-assess-id'),
                value   : $this.data('js-assess-value-id'),
                arStar  : $this.find('[data-js-assess-value-number]')
            });
            // Перебераем звездачки
            $this.data().arStar.each(function () {
                $(this).data({
                    id      : $(this).parent().data('js-assess-value-id'),
                    number  : $(this).data('js-assess-value-number')
                });

                $(this).on('click', function(){
                    core.onClick($this,$(this));
                });

                $(this).hover(function(){
                    core.onHover($this,$(this));
                });
            });

            $this.mouseleave(function(){
                $this.data().arStar.removeClass('hover');
            });
        });
    },
    onClick: function ($this,$element) {
        core.ajax($this,$element);
    },
    onHover: function ($this,$element) {
        var active_id = $element.data('js-assess-value-number');

        $this.data().arStar.each(function () {
            var id = $(this).data('js-assess-value-number');

            if(id <= active_id) {
                $(this).addClass('hover');
            }else {
                $(this).removeClass('hover');
            }
        });
    },
    ajax: function ($this,$element) {
        $.post("/app/components/assess/add/ajax.php", {
                table       : $this.data().table,
                id          : $this.data().id,
                value_id    : $element.data().id,
                value_number: $element.data().number
            }
            , onAjaxSuccess);
        function onAjaxSuccess(data){
            Assess.$add.html(data);
            core.load();
        }
    }
};
var Comment = {
    init: function () {
        // .....
        this.$add = $('[data-js-comment-add]');
        this.$block = $('.content__comment');
        this.$arResult = $('[data-js-comment-list-item]');
        // .....
        if(this.$add.length) {
            this.load();
        }
    },
    load: function () {
        this.$add.data({
            table   : this.$add.data('js-comment-add'),
            id      : this.$add.data('js-comment-add-id'),
            text    : this.$add.find('[data-js-comment-add-text]'),
            button  : this.$add.find('[data-js-comment-add-button]')
        });

        this.$add.data().button.on('click', function(e){
            e.preventDefault();
            Comment.add();
        });
    },
    add: function () {
        Comment.ajax(Comment.$add);
    },
    ajax: function ($this) {
        $.post("/app/components/comment/add/ajax.php", {
                table       : $this.data().table,
                id          : $this.data().id,
                text        : $this.data().text.val()
            }
            , onAjaxSuccess);
        function onAjaxSuccess(data){
            Comment.$block.html(data);
            Comment.init();
        }
    }
};
var Search = {
    time : 1000,

    init: function () {
        // .....
        this.$search = $('.header__search');
        this.$input = $('.header__search__input');
        this.$button = $('.header__search__button');

        this.$list = $('.header__search__list');
        // .....

        this.load();
    },
    load: function () {
        Search.$input.focus(function() {
            Search.$input.keyup(function (e) {
                e.preventDefault();
                Search.search();
            });
        })
            .blur(function(){ // - установим обработчик потери фокуса
                $(document).click(function(e) {
                    if ($(e.target).closest(Search.$search).length) return;
                    Search.exit();
                    e.stopPropagation();
                });
            });
        Search.$button.on('click',function(e) {
            e.preventDefault()
        });
        Search.$input.parents('form').submit(function(){
            return false;
        });
    },
    search: function () {
        // Время нажатия
        var timeKeyUp = new Date();
        timeKeyUp = timeKeyUp.getTime();


        setTimeout(function() {
            $this = Search.$input;

            if ($this.val().length <= 3){
                Search.exit();
                return false;
            }

            Search.$list.addClass('active');

            // Время текущие
            var timeSearch = new Date();
            timeSearch = timeSearch.getTime();

            if (timeSearch-timeKeyUp >= Search.time){
                Search.ajax($this);
            }
        }, Search.time);
    },
    exit: function () {
        Search.$list.removeClass('active');
    },
    ajax: function ($this) {
        $.post("/app/components/list/search/ajax.php", {
                text       : $this.val()
            }
            , onAjaxSuccess);
        function onAjaxSuccess(data){
            if($('.body-content').hasClass('js-core-mobile-open')) {
                $('.core__mobile').addClass('js-list');
            }
            Search.$list.html(data);
            Search.init();
        }
    }
};
// var AddUniversity = {
//     init: function () {
//         this.load();
//     },
//     load: function () {
//         this.$arElements    = $('.content__form');
//         // Обработка
//         this.$arElements.each(function () {
//             var $this = $(this);
//
//             $this.find('[data-js-form-control-type="select"]').change(function(){
//                 AddUniversity.onClick($this,$(this));
//             });
//
//             $this.find('[data-js-form-control-type="button"]').on('click', function(e){
//                 e.preventDefault();
//                 AddUniversity.onClick($this,$(this));
//             });
//
//         });
//     },
//     update: function ($this,$element) {
//         // Обработка DATA
//         var $status = false ,
//             $region = $this.find('[data-js-form-control="region"]').val(),
//             $city =   $this.find('[data-js-form-control="city"]').val(),
//             $name =   $this.find('[data-js-form-control="name"]').val();
//
//         // Если конечная отправка
//         if($element.is('[data-js-form-btn]')) {
//             $status = true;
//         }
//         $this.data({
//             region_id:   $region,
//             city_id:     $city,
//             name:        $name,
//             status:      $status
//         });
//
//     },
//     onClick: function ($this,$element) {
//         AddUniversity.update($this,$element);
//         AddUniversity.ajax($this);
//     },
//     ajax: function ($this) {
//         $.post("/application/components/add/university/ajax.php", {
//                 status       : $this.data('status'),
//                 region_id    : $this.data('region_id'),
//                 city_id      : $this.data('city_id'),
//                 name         : $this.data('name')
//             }
//             , onAjaxSuccess);
//         function onAjaxSuccess(data){
//             AddUniversity.$arElements.replaceWith(data);
//             AddUniversity.load();
//         }
//     }
// };
var AddTeacher = {
    init: function () {
        this.load();
    },
    load: function () {
        this.$arElements    = $('.content__form');
        // Обработка
        this.$arElements.each(function () {
            var $this = $(this);

            $this.find('[data-js-form-control-type="select"]').change(function(){
                AddTeacher.onClick($this,$(this));
            });

            $this.find('[data-js-form-control-type="button"]').on('click', function(e){
                e.preventDefault();
                AddTeacher.onClick($this,$(this));
            });

        });
    },
    update: function ($this,$element) {
        // Обработка DATA
        var $status = false ,
            $region = $this.find('[data-js-form-control="region"]').val(),
            $city =   $this.find('[data-js-form-control="city"]').val(),
            $university =   $this.find('[data-js-form-control="university"]').val(),
            $name =   $this.find('[data-js-form-control="name"]').val();

        // Если конечная отправка
        if($element.is('[data-js-form-btn]')) {
            $status = true;
        }
        $this.data({
            region_id:   $region,
            city_id:     $city,
            university_id: $university,
            name:        $name,
            status:      $status
        });

    },
    onClick: function ($this,$element) {
        AddTeacher.update($this,$element);
        AddTeacher.ajax($this);
    },
    ajax: function ($this) {
        $.post("/app/components/add/teacher/ajax.php", {
                status       : $this.data('status'),
                region_id    : $this.data('region_id'),
                city_id      : $this.data('city_id'),
                university_id: $this.data('university_id'),
                name         : $this.data('name')
            }
            , onAjaxSuccess);
        function onAjaxSuccess(data){
            AddTeacher.$arElements.replaceWith(data);
            AddTeacher.load();
        }
    }
};
