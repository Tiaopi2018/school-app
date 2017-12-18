/**
 * Created by Administrator on 2017/11/30.
 */
fabu = Vue.component('kaochang', function (success, error) {
    axios.get("/public/tpl/kaochang.html").then(function (res) {
        success({
            template: res.data,
            props: ['user'],
            data(){
                return {
                    jiazai:true,
                    kaochang:{},
                    itemStyleFinish : {
                        'float': 'right',
                        'margin-right': '6px',
                        'color': '#8f8f94'
                    },
                    itemStyleUnFinish : {
                        'float': 'right',
                        'margin-right': '6px',
                        'color': '#FFFFFF'
                    },
                }
            },
            methods:{

            },
            mounted: function(){
                $this = this;
                console.log(this.user);
                axios.get("/api/kaochang?user="+this.user).then(function(res){
                    $this.jiazai = false;
                    if(res.data.result.code == 0){
                        alert(res.data.result.message || '获取失败!');
                    }else{
                        $this.kaochang = res.data.kaochang;
                    }
                });
            }
        });
    });
});