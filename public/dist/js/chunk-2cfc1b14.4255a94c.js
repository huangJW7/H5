(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2cfc1b14"],{3978:function(t,e,a){t.exports=a.p+"img/关  闭.1a787020.svg"},"42f7":function(t,e,a){"use strict";a.r(e);var s=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"match"},[a("div",{directives:[{name:"show",rawName:"v-show",value:t.alert,expression:"alert"}],staticClass:"alert",on:{touchmove:function(t){t.stopPropagation(),t.preventDefault()}}},[a("p",{staticClass:"title"},[t._v("提示")]),a("p",{staticClass:"content"},[t._v("你还没有报名互选匹配，无法参与")]),a("router-link",{staticClass:"to",attrs:{to:"/sign"}},[t._v("前往报名")])],1),a("div",{directives:[{name:"show",rawName:"v-show",value:t.alert,expression:"alert"}],staticClass:"layer",on:{touchmove:function(t){t.stopPropagation(),t.preventDefault()}}}),t._l(t.render,(function(e,s){return a("MatchBox",{key:s,attrs:{data:e,openid:t.openid}})}))],2)},n=[],o=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"match-box"},[s("div",{directives:[{name:"show",rawName:"v-show",value:t.ifShow,expression:"ifShow"}],staticClass:"layer"}),s("div",{directives:[{name:"show",rawName:"v-show",value:t.ifShow,expression:"ifShow"}],staticClass:"box-content"},[s("ContentBox",{staticClass:"box",attrs:{data:t.data,openid:t.openid,flag:t.ifShow,likeFlag:1}}),s("img",{staticClass:"close",attrs:{src:a("3978")},on:{click:t.close}})],1),s("div",{staticClass:"actor-content",on:{click:t.show}},[s("img",{staticClass:"img",attrs:{src:t.data.imgUrl[0]}}),s("p",{staticClass:"nick-name"},[t._v(t._s(t.data.nickName))])])])},c=[],i=a("c770"),d={name:"MatchBox",props:["data","openid"],components:{ContentBox:i["a"]},data:function(){return{ifShow:0}},methods:{show:function(){this.$data.ifShow=1},close:function(){this.$data.ifShow=0}}},r=d,u=(a("a228"),a("2877")),f=Object(u["a"])(r,o,c,!1,null,"7a39c53c",null),l=f.exports,h={name:"Match",components:{MatchBox:l},mounted:function(){var t=this;this.openid=localStorage.getItem("openid"),this.axios.post("http://www.scgxtd.cn/public/user/active",{openid:this.openid}).then((function(e){0==e.data.code?t.render=e.data.data:-1==e.data.code&&alert(e.data.msg)}))},data:function(){return{alert:0,openid:"",render:[{episode:1,imgUrl:["https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4","https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4","https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4"],num:2,nickName:"S微光F",school:"UESTc",age:"99",height:"150",constellation:"天蝎座",place:"place",about:"长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长",target:"target",openid:"",uid:"",isLiked:!1,likes:"999",connect:"",isConnect:!1},{episode:1,imgUrl:["https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4","https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4","https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4"],num:2,nickName:"S微光F",school:"UESTc",age:"99",height:"150",constellation:"天蝎座",place:"place",about:"长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长",target:"target",openid:"",uid:"",isLiked:!1,likes:"999",connect:"",isConnect:!1},{episode:1,imgUrl:["https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4","https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4","https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4"],num:2,nickName:"S微光F",school:"UESTc",age:"99",height:"150",constellation:"天蝎座",place:"place",about:"长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长",target:"target",openid:"",uid:"",isLiked:!1,likes:"999",connect:"",isConnect:!1},{episode:1,imgUrl:["https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4","https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4","https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4"],num:2,nickName:"S微光F",school:"UESTc",age:"99",height:"150",constellation:"天蝎座",place:"place",about:"长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长",target:"target",openid:"",uid:"",isLiked:!1,likes:"999",connect:"",isConnect:!1}]}}},p=h,b=(a("ef8f"),Object(u["a"])(p,s,n,!1,null,"643c1156",null));e["default"]=b.exports},a228:function(t,e,a){"use strict";a("af3e")},af3e:function(t,e,a){},e2cb:function(t,e,a){},ef8f:function(t,e,a){"use strict";a("e2cb")}}]);
//# sourceMappingURL=chunk-2cfc1b14.4255a94c.js.map