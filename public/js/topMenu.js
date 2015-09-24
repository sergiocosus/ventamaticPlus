/**
 * Created by sergio on 30/08/15.
 */

function TopMenu(options,currenNumber) {
    var that = this;

    this.options = options;
    var showing = false;

    this.$header = $('header');
    this.$title = $('#title');
    this.$topMenuList = $('#topMenuList');
    this.$loginButton = $('#loginButton');
    this.$mainContainer = $('#mainContainer');
    this.current = this.options[currenNumber];

    this.fillOptionData=function (option) {
        var $text = $('<span>').text(option.title);
        $('<li>').css('background-color', option.color)
            .append($text)
            .appendTo(that.$topMenuList);
    };

    this.onHoverIn=function () {
        that.$topMenuList.addClass('showing');
        var $element = that.$topMenuList.children().first()
        showing = true;
        function callToEnd() {
            if ($element.length) {
                var $back = $element;
                $element = $back.next();
                if (showing) {
                    $back.addClass('showing');
                    setTimeout(callToEnd, 100);
                }
            }
        }
        callToEnd();
    };

    this.onHoverOut=function () {
        var $element = that.$topMenuList.children().last()
        showing = false;
        function callToEnd() {
            if ($element.length) {
                var $back = $element;
                $element = $back.prev();
                if (!showing) {
                    $back.removeClass('showing');
                    setTimeout(callToEnd, 100);
                }
            } else {
                that.$topMenuList.removeClass('showing');
            }
        }
        callToEnd();
        that.changeData(that.current);
    };

    this.onHoverOption = function (index) {
        $(this).hover(function () {
            that.changeData(options[index]);
        });
    };

    this.changeData = function(option){
        that.$header.css({'background-color': option.color});
        that.$topMenuList.css({'background-color': option.color});
        that.$title.children('h1').text(option.title);
        that.$mainContainer.css({'border-color': option.color});
    }

    this.$loginButton.hover(function(e){
        e.stopPropagation();

        console.log("in");
    }, function(e){
        console.log("out");
        e
    })

    this.options.forEach(this.fillOptionData);
    this.$header.children('#title').hover(this.onHoverIn, this.onHoverOut);
    this.$topMenuList.children().each(this.onHoverOption);
    this.changeData(this.current);
}