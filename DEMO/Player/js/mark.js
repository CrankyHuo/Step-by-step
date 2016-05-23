var Mark = {
    init:function($target,mark){
        this.$target = $target;
        this.mark = mark;
        this.bind();
    },
    bind:function(){
        var _this = this;
        this.$target.on('click',function(e){
            e.preventDefault();
            var $cur = $(this),
                index = $cur.index();
            $cur.siblings().find(_this.mark).css('opacity','0');
            $cur.find(_this.mark).css('opacity','0.8');
        })
    }
};
