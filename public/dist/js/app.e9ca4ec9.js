(function(t){function e(e){for(var o,n,c=e[0],r=e[1],d=e[2],l=0,u=[];l<c.length;l++)n=c[l],Object.prototype.hasOwnProperty.call(i,n)&&i[n]&&u.push(i[n][0]),i[n]=0;for(o in r)Object.prototype.hasOwnProperty.call(r,o)&&(t[o]=r[o]);p&&p(e);while(u.length)u.shift()();return s.push.apply(s,d||[]),a()}function a(){for(var t,e=0;e<s.length;e++){for(var a=s[e],o=!0,n=1;n<a.length;n++){var c=a[n];0!==i[c]&&(o=!1)}o&&(s.splice(e--,1),t=r(r.s=a[0]))}return t}var o={},n={app:0},i={app:0},s=[];function c(t){return r.p+"js/"+({about:"about"}[t]||t)+"."+{about:"232d66b5","chunk-09126679":"bf401010","chunk-dda1302e":"613fccf5"}[t]+".js"}function r(e){if(o[e])return o[e].exports;var a=o[e]={i:e,l:!1,exports:{}};return t[e].call(a.exports,a,a.exports,r),a.l=!0,a.exports}r.e=function(t){var e=[],a={about:1,"chunk-09126679":1,"chunk-dda1302e":1};n[t]?e.push(n[t]):0!==n[t]&&a[t]&&e.push(n[t]=new Promise((function(e,a){for(var o="css/"+({about:"about"}[t]||t)+"."+{about:"54b197b2","chunk-09126679":"e1f12996","chunk-dda1302e":"ed8a0a3a"}[t]+".css",i=r.p+o,s=document.getElementsByTagName("link"),c=0;c<s.length;c++){var d=s[c],l=d.getAttribute("data-href")||d.getAttribute("href");if("stylesheet"===d.rel&&(l===o||l===i))return e()}var u=document.getElementsByTagName("style");for(c=0;c<u.length;c++){d=u[c],l=d.getAttribute("data-href");if(l===o||l===i)return e()}var p=document.createElement("link");p.rel="stylesheet",p.type="text/css",p.onload=e,p.onerror=function(e){var o=e&&e.target&&e.target.src||i,s=new Error("Loading CSS chunk "+t+" failed.\n("+o+")");s.code="CSS_CHUNK_LOAD_FAILED",s.request=o,delete n[t],p.parentNode.removeChild(p),a(s)},p.href=i;var h=document.getElementsByTagName("head")[0];h.appendChild(p)})).then((function(){n[t]=0})));var o=i[t];if(0!==o)if(o)e.push(o[2]);else{var s=new Promise((function(e,a){o=i[t]=[e,a]}));e.push(o[2]=s);var d,l=document.createElement("script");l.charset="utf-8",l.timeout=120,r.nc&&l.setAttribute("nonce",r.nc),l.src=c(t);var u=new Error;d=function(e){l.onerror=l.onload=null,clearTimeout(p);var a=i[t];if(0!==a){if(a){var o=e&&("load"===e.type?"missing":e.type),n=e&&e.target&&e.target.src;u.message="Loading chunk "+t+" failed.\n("+o+": "+n+")",u.name="ChunkLoadError",u.type=o,u.request=n,a[1](u)}i[t]=void 0}};var p=setTimeout((function(){d({type:"timeout",target:l})}),12e4);l.onerror=l.onload=d,document.head.appendChild(l)}return Promise.all(e)},r.m=t,r.c=o,r.d=function(t,e,a){r.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:a})},r.r=function(t){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},r.t=function(t,e){if(1&e&&(t=r(t)),8&e)return t;if(4&e&&"object"===typeof t&&t&&t.__esModule)return t;var a=Object.create(null);if(r.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var o in t)r.d(a,o,function(e){return t[e]}.bind(null,o));return a},r.n=function(t){var e=t&&t.__esModule?function(){return t["default"]}:function(){return t};return r.d(e,"a",e),e},r.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},r.p="",r.oe=function(t){throw console.error(t),t};var d=window["webpackJsonp"]=window["webpackJsonp"]||[],l=d.push.bind(d);d.push=e,d=d.slice();for(var u=0;u<d.length;u++)e(d[u]);var p=l;s.push([0,"chunk-vendors"]),a()})({0:function(t,e,a){t.exports=a("56d7")},"034f":function(t,e,a){"use strict";a("85ec")},"10a6":function(t,e,a){t.exports=a.p+"img/qrcode.6f760a25.png"},"2d9e":function(t,e,a){},5380:function(t,e,a){t.exports=a.p+"img/爱心.40b8eeeb.svg"},"56d7":function(t,e,a){"use strict";a.r(e);a("e260"),a("e6cf"),a("cca6"),a("a79d");var o=a("2b0e"),n=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{attrs:{id:"app"}},[a("div",{attrs:{id:"nav"}},[a("router-link",{attrs:{to:"/"}},[t._v("男神&女神")]),a("router-link",{attrs:{to:"/history"}},[t._v("历史推送")]),a("router-link",{attrs:{to:"/match"}},[t._v("互选匹配")]),a("router-link",{attrs:{to:"/sign"}},[t._v("报名")])],1),a("router-view")],1)},i=[],s=(a("034f"),a("2877")),c={},r=Object(s["a"])(c,n,i,!1,null,null,null),d=r.exports,l=(a("d3b7"),a("3ca3"),a("ddb0"),a("b0c0"),a("8c4f")),u=function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("div",{staticClass:"home"},[o("div",{staticClass:"top",on:{click:t.showQR}},[t._v("点击关注四川高校脱单微信公众号")]),o("div",{directives:[{name:"show",rawName:"v-show",value:t.QR,expression:"QR"}],staticClass:"layer",on:{click:t.closeQR}}),o("div",{directives:[{name:"show",rawName:"v-show",value:t.QR,expression:"QR"}],staticClass:"pic-content"},[o("img",{staticClass:"pic",attrs:{src:a("10a6"),alt:""}})]),t._l(t.actor,(function(e,a){return o("ContentBox",{key:a,attrs:{data:e,openid:t.openid,flag:1,likeFlag:0},on:{refresh:t.refreshActor}})}))],2)},p=[],h=(a("841c"),a("ac1f"),a("1276"),a("c770")),m={name:"Home",components:{ContentBox:h["a"]},data:function(){return{openid:"",QR:!1,actor:[],localTest:!1}},methods:{refreshActor:function(){var t=this;this.axios.post("http://www.scgxtd.cn/public/user/message/shower",{id:sessionStorage.getItem("openid")}).then((function(e){0==e.data.code?t.actor=e.data.data:-1==e.data.code&&alert(e.data.msg)}))},showQR:function(){this.QR=!0},closeQR:function(){this.QR=!1}},mounted:function(){var t=this;if(1!=this.localTest){if(sessionStorage.getItem("openid")&&"undefined"!=sessionStorage.getItem("openid"))return console.log(sessionStorage.getItem("openid")),this.openid=sessionStorage.getItem("openid"),void this.axios.post("http://www.scgxtd.cn/public/user/message/shower",{id:sessionStorage.getItem("openid")}).then((function(e){0==e.data.code?t.actor=e.data.data:-1==e.data.code&&alert(e.data.msg)}));var e="wx4d1f2c66828fd817",a=encodeURIComponent("http://www.scgxtd.cn/public/dist/"),o=decodeURI(location.search);if(-1!=o.indexOf("?code")){var n=o.substr(o.indexOf("?code")+6).split("&")[0];console.log(n);var i=this;this.axios.post("http://www.scgxtd.cn/public/index/getcode/token",{code:n}).then((function(t){console.log(t),"undefined"!=t.data.data?0==t.data.code?(sessionStorage.setItem("openid",t.data.data),i.openid=t.data.data,console.log(i.openid),i.axios.post("http://www.scgxtd.cn/public/user/message/shower",{id:sessionStorage.getItem("openid")}).then((function(t){console.log(t),0==t.data.code?i.actor=t.data.data:-1==t.data.code&&alert(t.data.msg)}))):i.$message("登录失败，状态："+t.status+t.statusText):this.$message("登录失败，请重试")}))}else window.location.href="https://open.weixin.qq.com/connect/oauth2/authorize?appid="+e+"&redirect_uri="+a+"&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect"}}},f=m,g=(a("728d"),Object(s["a"])(f,u,p,!1,null,"6f0049c7",null)),v=g.exports;o["default"].use(l["a"]);var w=[{path:"/",name:"Home",component:v},{path:"/history",name:"History",component:function(){return a.e("about").then(a.bind(null,"e4bb"))}},{path:"/match",name:"Match",component:function(){return a.e("chunk-09126679").then(a.bind(null,"42f7"))}},{path:"/sign",name:"Sign",component:function(){return a.e("chunk-dda1302e").then(a.bind(null,"1c4f"))}}],b=new l["a"]({routes:w});b.beforeEach((function(t,e,a){"Home"===t.name&&a(),"History"!==t.name&&"Match"!==t.name&&"Sign"!==t.name||"Home"!==e.name||a(),"Home"!==t.name&&"Match"!==t.name&&"Sign"!==t.name||"History"!==e.name||a(),"History"!==t.name&&"Home"!==t.name&&"Sign"!==t.name||"Match"!==e.name||a(),"History"!==t.name&&"Home"!==t.name&&"Match"!==t.name||"Sign"!==e.name||a(),"History"===t.name&&"Home"!==e.name&&"Match"!==e.name&&"Sign"!==e.name&&a({path:"/"}),"Match"===t.name&&"Home"!==e.name&&"History"!==e.name&&"Sign"!==e.name&&a({path:"/"}),"Sign"===t.name&&"Home"!==e.name&&"Match"!==e.name&&"History"!==e.name&&a({path:"/"})}));var y=b,k=a("bc3a"),x=a.n(k),_=a("4328"),C=a.n(_),S=a("5c96"),P=a.n(S);a("0fae");o["default"].use(P.a),o["default"].prototype.axios=x.a,o["default"].prototype.$qs=C.a,o["default"].config.productionTip=!1,new o["default"]({router:y,render:function(t){return t(d)}}).$mount("#app")},"728d":function(t,e,a){"use strict";a("d458")},8541:function(t,e,a){"use strict";a("2d9e")},"85ec":function(t,e,a){},c770:function(t,e,a){"use strict";var o=function(){var t=this,e=t.$createElement,o=t._self._c||e;return 1==t.flag?o("div",{class:"女"==t.data.gender?"contentbox":"contentbox1"},[this.openid==t.data.ID?o("el-button",{directives:[{name:"show",rawName:"v-show",value:1!=t.likeFlag,expression:"likeFlag != 1"}],staticClass:"drop",attrs:{type:"danger",plain:""},on:{click:t.drop}},[t._v(" 我要下墙 ")]):t._e(),o("p",{staticClass:"actor-title"},[t._v(" "+t._s("男"==t.data.gender?"男神":"女神")+" ")]),o("div",{staticClass:"pic-content"},[o("el-carousel",t._l(t.data.image,(function(t){return o("el-carousel-item",{key:t.index},[o("el-image",{staticStyle:{height:"300px"},attrs:{src:t,fit:"contain"}})],1)})),1)],1),this.openid!=t.data.ID?o("div",{staticClass:"like",on:{click:t.like}},[o("img",{class:1==t.isLiked?"heart-anim":"heart",attrs:{src:a("5380")}}),o("span",{directives:[{name:"show",rawName:"v-show",value:1!=t.likeFlag,expression:"likeFlag!=1"}],class:(t.isLiked,"likes")},[t._v(t._s(t.data.like))])]):t._e(),o("div",{staticClass:"main-info"},[o("div",{staticClass:"top-info"},[o("div",{staticClass:"nickName"},[t._v(t._s(t.data.name))]),o("div",{staticClass:"school"},[t._v(t._s(t.data.school))])]),o("div",{staticClass:"but-info"},[o("div",{staticClass:"age"},[t._v(t._s(t.data.age)+"岁")]),t._v("· "),o("div",{staticClass:"height"},[t._v(t._s(t.data.height)+"cm")]),t._v("· "),o("div",{staticClass:"constellation"},[t._v(t._s(t.data.star))]),t._v("· "),o("div",{staticClass:"place"},[t._v(t._s(t.data.location))])])]),o("div",{staticClass:"sub-info"}),o("div",{staticClass:"about-me"},[t._v("关于我:"),o("br"),t._v(t._s(t.data.introduction))]),o("div",{staticClass:"target"},[t._v("我喜欢的TA: "),o("br"),t._v(t._s(t.data.goal))]),1!=t.likeFlag?o("div",{directives:[{name:"show",rawName:"v-show",value:0!=t.data.ispay||1==this.paied,expression:"data.ispay != 0 || this.paied == 1"}],staticClass:"connect"},[t._v(" 联系方式:"+t._s(t.data.connect)+" ")]):t._e(),o("el-button",{directives:[{name:"show",rawName:"v-show",value:1!=t.likeFlag&&0==t.data.ispay&&this.openid!=t.data.ID,expression:"likeFlag != 1 && data.ispay == 0&&this.openid!=data.ID"}],staticClass:"get-info",attrs:{type:"danger",plain:""},on:{click:t.handlePayNotice}},[t._v(" 获取联系方式 ")]),o("p",{staticClass:"feedback",on:{click:t.feedback}},[t._v("反馈")]),o("div",{directives:[{name:"show",rawName:"v-show",value:t.showFeedback,expression:"showFeedback"}],staticClass:"layer",on:{scroll:function(t){t.stopPropagation(),t.preventDefault()},touchmove:function(t){t.stopPropagation(),t.preventDefault()}}}),o("div",{directives:[{name:"show",rawName:"v-show",value:t.showPayNotice,expression:"showPayNotice"}],staticClass:"layer",on:{scroll:function(t){t.stopPropagation(),t.preventDefault()},touchmove:function(t){t.stopPropagation(),t.preventDefault()}}}),o("div",{directives:[{name:"show",rawName:"v-show",value:t.showDrop,expression:"showDrop"}],staticClass:"layer",on:{scroll:function(t){t.stopPropagation(),t.preventDefault()},touchmove:function(t){t.stopPropagation(),t.preventDefault()}}}),o("div",{directives:[{name:"show",rawName:"v-show",value:t.showFeedback,expression:"showFeedback"}],staticClass:"feedback-log",on:{scroll:function(t){t.stopPropagation(),t.preventDefault()},touchmove:function(t){t.stopPropagation(),t.preventDefault()}}},[o("el-input",{staticClass:"question",attrs:{type:"textarea",rows:5,placeholder:"反馈问题"},model:{value:t.question,callback:function(e){t.question=e},expression:"question"}}),o("el-input",{staticClass:"feed-connect",attrs:{type:"text",placeholder:"联系方式(QQ或邮箱等)"},model:{value:t.feedConnect,callback:function(e){t.feedConnect=e},expression:"feedConnect"}}),o("div",{staticClass:"button-content"},[o("el-button",{attrs:{type:"danger",plain:""},on:{click:t.cancel}},[t._v("取消")]),o("el-button",{attrs:{type:"primary",plain:""},on:{click:t.submit}},[t._v(t._s(t.btnWord))])],1)],1),o("div",{directives:[{name:"show",rawName:"v-show",value:t.showDrop,expression:"showDrop"}],staticClass:"feedback-log",staticStyle:{height:"160px"},on:{scroll:function(t){t.stopPropagation(),t.preventDefault()},touchmove:function(t){t.stopPropagation(),t.preventDefault()}}},[o("el-input",{staticClass:"feed-connect",staticStyle:{"margin-bottom":"30px","padding-top":"10px"},attrs:{placeholder:"上墙时填写的邮箱"},model:{value:t.mail,callback:function(e){t.mail=e},expression:"mail"}}),o("div",{staticClass:"button-content"},[o("el-button",{attrs:{type:"danger",plain:""},on:{click:t.submitDrop}},[t._v("下墙")]),o("el-button",{attrs:{type:"primary",plain:""},on:{click:t.cancel}},[t._v("取消")])],1)],1),o("div",{directives:[{name:"show",rawName:"v-show",value:t.showPayNotice,expression:"showPayNotice"}],staticClass:"feedback-log",staticStyle:{height:"200px",color:"black"},on:{scroll:function(t){t.stopPropagation(),t.preventDefault()},touchmove:function(t){t.stopPropagation(),t.preventDefault()}}},[o("h4",{staticStyle:{"margin-top":"20px","margin-bottom":"5px"}},[t._v("提示！")]),o("p",{staticStyle:{"margin-bottom":"0px"}},[t._v("您即将前往支付，支付后即可获取联系方式。")]),t._m(0),o("div",[o("el-button",{attrs:{plain:""},on:{click:t.closePayNotice}},[t._v("取消")]),o("el-button",{attrs:{type:"primary",plain:""},on:{click:t.getInfo}},[t._v("同意并支付")])],1)]),o("div",{directives:[{name:"show",rawName:"v-show",value:t.dialogVisible,expression:"dialogVisible"}],staticClass:"dialog",staticStyle:{height:"200px",color:"black"},on:{scroll:function(t){t.stopPropagation(),t.preventDefault()},touchmove:function(t){t.stopPropagation(),t.preventDefault()}}},[o("h4",{staticStyle:{"margin-top":"20px","margin-bottom":"5px"}},[t._v("正在前往支付")]),o("p",{staticStyle:{"margin-bottom":"0px"}},[t._v("点击确定前往获取联系方式")]),o("div",[o("el-button",{attrs:{type:"primary",plain:""},on:{click:t.handleGetInfo}},[t._v("确定")])],1)])],1):t._e()},n=[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("p",{staticStyle:{"margin-top":"0px"}},[t._v("您需要同意"),a("a",{attrs:{href:"http://proscgxtd.mikecrm.com/PxoydYR"}},[t._v("支付协议")])])}],i=a("53ca"),s=(a("a9e3"),{name:"ContentBox",props:["data","openid","flag","likeFlag"],data:function(){return{btnWord:"提交",question:"",feedConnect:"",showFeedback:!1,isLiked:!1,mail:"",showDrop:!1,showPayNotice:!1,paied:0,dialogVisible:!1}},mounted:function(){},methods:{handleGetInfo:function(){this.showPayNotice=!1,this.$emit("refresh"),this.dialogVisible=!1},drop:function(){this.showDrop=!0},like:function(){var t=this;if(console.log(this.data),0==this.likeFlag&&1!=this.isLiked){this.axios.post("http://www.scgxtd.cn/public/user/message/like",{actorUid:this.data.ID});var e=Number(this.data.like);e+=1,this.isLiked=!0,this.data.like=e,console.log(this.data.like),console.log(Object(i["a"])(this.data.like))}else 1==this.likeFlag&&(this.isLiked=!0,this.axios.post("http://www.scgxtd.cn/public/user/active/like",{openid:this.openid,actorid:this.data.ID}).then((function(e){0==e.data.code?t.$message("点赞成功"):-1==e.data.code&&t.$message("点赞失败:"+e.data.msg)})))},feedback:function(){this.$data.showFeedback=!0},submit:function(){var t=this;this.btnWord="正在提交",this.axios.post("http://www.scgxtd.cn/public/user/suggestion",{question:this.question,connect:this.feedConnect}).then((function(e){t.btnWord="提交",t.$data.showFeedback=!1,0==e.data.code?t.$message("反馈成功"):-1==e.data.code&&t.$message("反馈失败，msg:"+e.data.msg)})),console.log(this.$data.question),console.log(this.$data.feedConnect),this.$data.showFeedback=!1},submitDrop:function(){var t=this;this.axios.post("http://www.scgxtd.cn/public/user/message/quit",{openid:this.openid,email:this.mail}).then((function(e){0==e.data.code?(t.$message("下墙成功"),t.showDrop=!1):-1==e.data.code&&t.$message("下墙失败,"+e.data.msg)}))},cancel:function(){this.$data.showFeedback=!1,this.showDrop=!1},handlePayNotice:function(){this.showPayNotice=!0},closePayNotice:function(){this.showPayNotice=!1,this.$emit("refresh")},getInfo:function(){var t=this;console.log(this.data),this.axios.post("http://www.scgxtd.cn/public/index/wxpay/getjsparam",{openid:this.openid,actorid:this.data.ID}).then((function(e){"undefined"==typeof WeixinJSBridge?document.addEventListener?document.addEventListener("WeixinJSBridgeReady",t.onBridgeReady,!1):document.attachEvent&&(document.attachEvent("WeixinJSBridgeReady",t.onBridgeReady),document.attachEvent("onWeixinJSBridgeReady",t.onBridgeReady)):t.onBridgeReady(e)})).catch((function(t){console.log(t)})),this.dialogVisible=!0},onBridgeReady:function(t){WeixinJSBridge.invoke("getBrandWCPayRequest",{appId:t.data.appId,timeStamp:t.data.timeStamp,nonceStr:t.data.nonceStr,package:t.data.package,signType:"MD5",paySign:t.data.paySign},(function(t){this.data.ispay=1,this.paied=1,"get_brand_wcpay_request:ok"==t.err_msg&&this.$message("支付成功！正在刷新")}))}}}),c=s,r=(a("8541"),a("2877")),d=Object(r["a"])(c,o,n,!1,null,"287e7ed4",null);e["a"]=d.exports},d458:function(t,e,a){}});
//# sourceMappingURL=app.e9ca4ec9.js.map