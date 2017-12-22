/**
 * Created by Administrator on 2017/11/30.
 */
fabu = Vue.component('liushui', function (success, error) {
    axios.get("/public/tpl/liushui.html").then(function (res) {
        success({
            template: res.data,
            props: ['user'],
            data(){
                return {
                    jiazai:true,
                    liushui:[],
                    queryList:[]
                }
            },
            computed: {

            },
            methods:{

            },

            mounted: function(){
                this.jiazai = true;
                $this = this;
                axios.get('/wx/yikatong/queryList?user=' + this.user).then(function(res){
                    $this.jiazai = false;
                    $this.queryList =res.data;
                });

                axios.post('wx/yikatong/liushui?user=' + this.user).then(function(res){
                    if(res.result.code == -2){

                    }
                });
            }
        });
    });
});