/**
 * Created by sergio on 30/08/15.
 */

function TopMenu(options,currenNumber) {
    var that = this;

    this.options = options;
    var showing = false;

    this.$header = $('header');
    this.$topMenuList = $('#topMenuList');
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
        var $element = that.$topMenuList.children().first()
        showing = false;
        function callToEnd() {
            if ($element.length) {
                var $back = $element;
                $element = $back.next();
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
        that.$header.children('h1').text(option.title);
    }

    this.options.forEach(this.fillOptionData);
    this.$header.hover(this.onHoverIn, this.onHoverOut);
    this.$topMenuList.children().each(this.onHoverOption);
}