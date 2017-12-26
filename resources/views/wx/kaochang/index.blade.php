<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>查考场@遇见商大</title>
    <script src="/public/wx/js/mui.min.js"></script>
    <link href="/public/wx/css/mui.css" rel="stylesheet"/>
    <link href="/public/wx/css/index.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/public/vendors/weui/weui.css">

    <script type="text/javascript" charset="utf-8">
        mui.init();
    </script>
</head>
<body>
<div id="app">
    <Kaochang user="{{$user}}"/>
</div>
<script src="{{ asset('public/vendors/weui/zepto.min.js') }}"></script>
<script src="{{ asset('public/vendors/vue/vue.js') }}"></script>
<script src="{{ asset('public/vendors/vue/vue-router.js') }}"></script>
<script src="{{ asset('public/vendors/vue/axios.min.js') }}"></script>

<script type="text/javascript">
    $(function () {
        axios.defaults.baseURL = 'http://school.sz25.net';
        axios.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
    });
</script>
<script src="{{ asset('public/vue/kaochang.js') }}"></script>
<script>
    data = {
        nav_active: 'tiezi',
        tiezi:[],
    };

    vue = new Vue({
        data: data,
        load: true,
        methods: {

        },
        mounted:function(){

        }
    }).$mount('#app');
</script>
</body>
</html>
