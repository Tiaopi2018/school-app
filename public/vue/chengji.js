/**
 * Created by Administrator on 2017/11/30.
 */
fabu = Vue.component('chengji', function (success, error) {
    axios.get("/public/tpl/chengji.html").then(function (res) {
        success({
            template: res.data,
            props: ['user'],
            data(){
                return {
                    chengji:{}
                }
            },
            methods:{

            },
            mounted:function(){
                $this = this;
                axios.get("/api/chengji?user="+this.user).then(function(res){
                    if(res.data.result.code == 0){
                        alert(res.data.result.message || '获取失败!');
                    }else{
                        $this.chengji = res.data.chengji;
                    }
                });
            }
        });
    });
});