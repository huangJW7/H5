(function(e){function t(t){for(var n,s,c=t[0],r=t[1],d=t[2],u=0,l=[];u<c.length;u++)s=c[u],Object.prototype.hasOwnProperty.call(o,s)&&o[s]&&l.push(o[s][0]),o[s]=0;for(n in r)Object.prototype.hasOwnProperty.call(r,n)&&(e[n]=r[n]);f&&f(t);while(l.length)l.shift()();return i.push.apply(i,d||[]),a()}function a(){for(var e,t=0;t<i.length;t++){for(var a=i[t],n=!0,s=1;s<a.length;s++){var c=a[s];0!==o[c]&&(n=!1)}n&&(i.splice(t--,1),e=r(r.s=a[0]))}return e}var n={},s={app:0},o={app:0},i=[];function c(e){return r.p+"js/"+({about:"about"}[e]||e)+"."+{about:"841c9aa2","chunk-2cfc1b14":"4255a94c","chunk-4b5a51c1":"8f5d0ef6"}[e]+".js"}function r(t){if(n[t])return n[t].exports;var a=n[t]={i:t,l:!1,exports:{}};return e[t].call(a.exports,a,a.exports,r),a.l=!0,a.exports}r.e=function(e){var t=[],a={about:1,"chunk-2cfc1b14":1,"chunk-4b5a51c1":1};s[e]?t.push(s[e]):0!==s[e]&&a[e]&&t.push(s[e]=new Promise((function(t,a){for(var n="css/"+({about:"about"}[e]||e)+"."+{about:"d2c5fdb5","chunk-2cfc1b14":"a6e6b992","chunk-4b5a51c1":"b82c3ba7"}[e]+".css",o=r.p+n,i=document.getElementsByTagName("link"),c=0;c<i.length;c++){var d=i[c],u=d.getAttribute("data-href")||d.getAttribute("href");if("stylesheet"===d.rel&&(u===n||u===o))return t()}var l=document.getElementsByTagName("style");for(c=0;c<l.length;c++){d=l[c],u=d.getAttribute("data-href");if(u===n||u===o)return t()}var f=document.createElement("link");f.rel="stylesheet",f.type="text/css",f.onload=t,f.onerror=function(t){var n=t&&t.target&&t.target.src||o,i=new Error("Loading CSS chunk "+e+" failed.\n("+n+")");i.code="CSS_CHUNK_LOAD_FAILED",i.request=n,delete s[e],f.parentNode.removeChild(f),a(i)},f.href=o;var p=document.getElementsByTagName("head")[0];p.appendChild(f)})).then((function(){s[e]=0})));var n=o[e];if(0!==n)if(n)t.push(n[2]);else{var i=new Promise((function(t,a){n=o[e]=[t,a]}));t.push(n[2]=i);var d,u=document.createElement("script");u.charset="utf-8",u.timeout=120,r.nc&&u.setAttribute("nonce",r.nc),u.src=c(e);var l=new Error;d=function(t){u.onerror=u.onload=null,clearTimeout(f);var a=o[e];if(0!==a){if(a){var n=t&&("load"===t.type?"missing":t.type),s=t&&t.target&&t.target.src;l.message="Loading chunk "+e+" failed.\n("+n+": "+s+")",l.name="ChunkLoadError",l.type=n,l.request=s,a[1](l)}o[e]=void 0}};var f=setTimeout((function(){d({type:"timeout",target:u})}),12e4);u.onerror=u.onload=d,document.head.appendChild(u)}return Promise.all(t)},r.m=e,r.c=n,r.d=function(e,t,a){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:a})},r.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var a=Object.create(null);if(r.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)r.d(a,n,function(t){return e[t]}.bind(null,n));return a},r.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="",r.oe=function(e){throw console.error(e),e};var d=window["webpackJsonp"]=window["webpackJsonp"]||[],u=d.push.bind(d);d.push=t,d=d.slice();for(var l=0;l<d.length;l++)t(d[l]);var f=u;i.push([0,"chunk-vendors"]),a()})({0:function(e,t,a){e.exports=a("56d7")},"034f":function(e,t,a){"use strict";a("85ec")},"0c03":function(e,t,a){"use strict";a("18a9")},"18a9":function(e,t,a){},4678:function(e,t,a){var n={"./af":"2bfb","./af.js":"2bfb","./ar":"8e73","./ar-dz":"a356","./ar-dz.js":"a356","./ar-kw":"423e","./ar-kw.js":"423e","./ar-ly":"1cfd","./ar-ly.js":"1cfd","./ar-ma":"0a84","./ar-ma.js":"0a84","./ar-sa":"8230","./ar-sa.js":"8230","./ar-tn":"6d83","./ar-tn.js":"6d83","./ar.js":"8e73","./az":"485c","./az.js":"485c","./be":"1fc1","./be.js":"1fc1","./bg":"84aa","./bg.js":"84aa","./bm":"a7fa","./bm.js":"a7fa","./bn":"9043","./bn-bd":"9686","./bn-bd.js":"9686","./bn.js":"9043","./bo":"d26a","./bo.js":"d26a","./br":"6887","./br.js":"6887","./bs":"2554","./bs.js":"2554","./ca":"d716","./ca.js":"d716","./cs":"3c0d","./cs.js":"3c0d","./cv":"03ec","./cv.js":"03ec","./cy":"9797","./cy.js":"9797","./da":"0f14","./da.js":"0f14","./de":"b469","./de-at":"b3eb","./de-at.js":"b3eb","./de-ch":"bb71","./de-ch.js":"bb71","./de.js":"b469","./dv":"598a","./dv.js":"598a","./el":"8d47","./el.js":"8d47","./en-au":"0e6b","./en-au.js":"0e6b","./en-ca":"3886","./en-ca.js":"3886","./en-gb":"39a6","./en-gb.js":"39a6","./en-ie":"e1d3","./en-ie.js":"e1d3","./en-il":"7333","./en-il.js":"7333","./en-in":"ec2e","./en-in.js":"ec2e","./en-nz":"6f50","./en-nz.js":"6f50","./en-sg":"b7e9","./en-sg.js":"b7e9","./eo":"65db","./eo.js":"65db","./es":"898b","./es-do":"0a3c","./es-do.js":"0a3c","./es-mx":"b5b7","./es-mx.js":"b5b7","./es-us":"55c9","./es-us.js":"55c9","./es.js":"898b","./et":"ec18","./et.js":"ec18","./eu":"0ff2","./eu.js":"0ff2","./fa":"8df4","./fa.js":"8df4","./fi":"81e9","./fi.js":"81e9","./fil":"d69a","./fil.js":"d69a","./fo":"0721","./fo.js":"0721","./fr":"9f26","./fr-ca":"d9f8","./fr-ca.js":"d9f8","./fr-ch":"0e49","./fr-ch.js":"0e49","./fr.js":"9f26","./fy":"7118","./fy.js":"7118","./ga":"5120","./ga.js":"5120","./gd":"f6b4","./gd.js":"f6b4","./gl":"8840","./gl.js":"8840","./gom-deva":"aaf2","./gom-deva.js":"aaf2","./gom-latn":"0caa","./gom-latn.js":"0caa","./gu":"e0c5","./gu.js":"e0c5","./he":"c7aa","./he.js":"c7aa","./hi":"dc4d","./hi.js":"dc4d","./hr":"4ba9","./hr.js":"4ba9","./hu":"5b14","./hu.js":"5b14","./hy-am":"d6b6","./hy-am.js":"d6b6","./id":"5038","./id.js":"5038","./is":"0558","./is.js":"0558","./it":"6e98","./it-ch":"6f12","./it-ch.js":"6f12","./it.js":"6e98","./ja":"079e","./ja.js":"079e","./jv":"b540","./jv.js":"b540","./ka":"201b","./ka.js":"201b","./kk":"6d79","./kk.js":"6d79","./km":"e81d","./km.js":"e81d","./kn":"3e92","./kn.js":"3e92","./ko":"22f8","./ko.js":"22f8","./ku":"2421","./ku.js":"2421","./ky":"9609","./ky.js":"9609","./lb":"440c","./lb.js":"440c","./lo":"b29d","./lo.js":"b29d","./lt":"26f9","./lt.js":"26f9","./lv":"b97c","./lv.js":"b97c","./me":"293c","./me.js":"293c","./mi":"688b","./mi.js":"688b","./mk":"6909","./mk.js":"6909","./ml":"02fb","./ml.js":"02fb","./mn":"958b","./mn.js":"958b","./mr":"39bd","./mr.js":"39bd","./ms":"ebe4","./ms-my":"6403","./ms-my.js":"6403","./ms.js":"ebe4","./mt":"1b45","./mt.js":"1b45","./my":"8689","./my.js":"8689","./nb":"6ce3","./nb.js":"6ce3","./ne":"3a39","./ne.js":"3a39","./nl":"facd","./nl-be":"db29","./nl-be.js":"db29","./nl.js":"facd","./nn":"b84c","./nn.js":"b84c","./oc-lnc":"167b","./oc-lnc.js":"167b","./pa-in":"f3ff","./pa-in.js":"f3ff","./pl":"8d57","./pl.js":"8d57","./pt":"f260","./pt-br":"d2d4","./pt-br.js":"d2d4","./pt.js":"f260","./ro":"972c","./ro.js":"972c","./ru":"957c","./ru.js":"957c","./sd":"6784","./sd.js":"6784","./se":"ffff","./se.js":"ffff","./si":"eda5","./si.js":"eda5","./sk":"7be6","./sk.js":"7be6","./sl":"8155","./sl.js":"8155","./sq":"c8f3","./sq.js":"c8f3","./sr":"cf1e","./sr-cyrl":"13e9","./sr-cyrl.js":"13e9","./sr.js":"cf1e","./ss":"52bd","./ss.js":"52bd","./sv":"5fbd","./sv.js":"5fbd","./sw":"74dc","./sw.js":"74dc","./ta":"3de5","./ta.js":"3de5","./te":"5cbb","./te.js":"5cbb","./tet":"576c","./tet.js":"576c","./tg":"3b1b","./tg.js":"3b1b","./th":"10e8","./th.js":"10e8","./tk":"5aff","./tk.js":"5aff","./tl-ph":"0f38","./tl-ph.js":"0f38","./tlh":"cf75","./tlh.js":"cf75","./tr":"0e81","./tr.js":"0e81","./tzl":"cf51","./tzl.js":"cf51","./tzm":"c109","./tzm-latn":"b53d","./tzm-latn.js":"b53d","./tzm.js":"c109","./ug-cn":"6117","./ug-cn.js":"6117","./uk":"ada2","./uk.js":"ada2","./ur":"5294","./ur.js":"5294","./uz":"2e8c","./uz-latn":"010e","./uz-latn.js":"010e","./uz.js":"2e8c","./vi":"2921","./vi.js":"2921","./x-pseudo":"fd7e","./x-pseudo.js":"fd7e","./yo":"7f33","./yo.js":"7f33","./zh-cn":"5c3a","./zh-cn.js":"5c3a","./zh-hk":"49ab","./zh-hk.js":"49ab","./zh-mo":"3a6c","./zh-mo.js":"3a6c","./zh-tw":"90ea","./zh-tw.js":"90ea"};function s(e){var t=o(e);return a(t)}function o(e){if(!a.o(n,e)){var t=new Error("Cannot find module '"+e+"'");throw t.code="MODULE_NOT_FOUND",t}return n[e]}s.keys=function(){return Object.keys(n)},s.resolve=o,e.exports=s,s.id="4678"},5380:function(e,t,a){e.exports=a.p+"img/爱心.40b8eeeb.svg"},"56d7":function(e,t,a){"use strict";a.r(t);a("b0c0"),a("8fb1");var n=a("0c63"),s=(a("6ba6"),a("5efb")),o=(a("eb14"),a("39ab")),i=(a("e260"),a("e6cf"),a("cca6"),a("a79d"),a("2b0e")),c=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{attrs:{id:"app"}},[a("div",{attrs:{id:"nav"}},[a("router-link",{attrs:{to:"/"}},[e._v("男神&女神")]),a("router-link",{attrs:{to:"/history"}},[e._v("历史推送")]),a("router-link",{attrs:{to:"/match"}},[e._v("互选匹配")]),a("router-link",{attrs:{to:"/sign"}},[e._v("报名")])],1),a("router-view")],1)},r=[],d=(a("034f"),a("2877")),u={},l=Object(d["a"])(u,c,r,!1,null,null,null),f=l.exports,p=(a("d3b7"),a("8c4f")),b=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"home"},e._l(e.actor,(function(t,n){return a("ContentBox",{key:n,attrs:{data:t,openid:e.openid,flag:1,likeFlag:0}})})),1)},h=[],m=(a("c975"),a("ac1f"),a("841c"),a("1276"),a("c770")),v={name:"Home",components:{ContentBox:m["a"]},data:function(){return{openid:"ontNP6DPWBgc1bKdDlH3MUwkSzfY",actor:[{episode:1,imgUrl:["https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4","https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4","https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4"],num:1,nickName:"S微光F",school:"UESTc",age:"99",height:"150",constellation:"天蝎座",place:"place",about:"长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长",target:"target",uid:"testid",isLiked:!1,likes:"999",connect:"test",isConnect:!0},{episode:1,imgUrl:["https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4","https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4","https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4"],num:2,nickName:"S微光F",school:"UESTc",age:"99",height:"150",constellation:"天蝎座",place:"place",about:"长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长",target:"target",openid:"",uid:"",isLiked:!1,likes:"999",connect:"",isConnect:!1},{episode:1,imgUrl:["https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4","https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4","https://avatars2.githubusercontent.com/u/46736350?s=460&u=33838727dd329e3cbdb6337f6f56f04ddf647b27&v=4"],num:3,nickName:"S微光F",school:"UESTc",age:"99",height:"150",constellation:"天蝎座",place:"place",about:"长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长长",target:"target",openid:"",uid:"",isLiked:!1,likes:"999",connect:"",isConnect:!1}]}},methods:{},mounted:function(){var e=this,t="wx4d1f2c66828fd817",a=encodeURIComponent("http://www.scgxtd.cn/public/dist/#/"),n=decodeURI(location.search);if(-1!=n.indexOf("?code")){var s=n.substr(n.indexOf("?code")+6).split("&")[0];console.log(s),this.axios.post("http://www.scgxtd.cn/public/index/getcode/token",{code:s}).then((function(e){console.log(e),localStorage.setItem("openid",e.data),this.openid=e.data}))}else window.location.href="https://open.weixin.qq.com/connect/oauth2/authorize?appid="+t+"&redirect_uri="+a+"&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect";localStorage.setItem("openid",this.openid),this.axios.post("http://www.scgxtd.cn/public/user/message/shower",{openid:this.openid}).then((function(t){console.log(t),0==t.data.code?e.actor=t.data.data:-1==t.data.code&&alert(t.data.msg)}))}},g=v,j=(a("cab8"),Object(d["a"])(g,b,h,!1,null,"1a4654eb",null)),k=j.exports;i["a"].use(p["a"]);var w=[{path:"/",name:"Home",component:k},{path:"/history",name:"History",component:function(){return a.e("about").then(a.bind(null,"e4bb"))}},{path:"/match",name:"Match",component:function(){return a.e("chunk-2cfc1b14").then(a.bind(null,"42f7"))}},{path:"/sign",name:"Sign",component:function(){return a.e("chunk-4b5a51c1").then(a.bind(null,"1c4f"))}}],y=new p["a"]({routes:w});y.beforeEach((function(e,t,a){"Home"===e.name&&a(),"History"!==e.name&&"Match"!==e.name&&"Sign"!==e.name||"Home"!==t.name||a(),"Home"!==e.name&&"Match"!==e.name&&"Sign"!==e.name||"History"!==t.name||a(),"History"!==e.name&&"Home"!==e.name&&"Sign"!==e.name||"Match"!==t.name||a(),"History"!==e.name&&"Home"!==e.name&&"Match"!==e.name||"Sign"!==t.name||a(),"History"===e.name&&"Home"!==t.name&&"Match"!==t.name&&"Sign"!==t.name&&a({path:"/"}),"Match"===e.name&&"Home"!==t.name&&"History"!==t.name&&"Sign"!==t.name&&a({path:"/"}),"Sign"===e.name&&"Home"!==t.name&&"Match"!==t.name&&"History"!==t.name&&a({path:"/"})}));var _=y,x=a("bc3a"),C=a.n(x),S=a("4328"),z=a.n(S);i["a"].prototype.axios=C.a,i["a"].prototype.$qs=z.a,i["a"].component(o["a"].name,o["a"]),i["a"].component(s["a"].name,s["a"]),i["a"].component(n["a"].name,n["a"]),i["a"].config.productionTip=!1,new i["a"]({router:_,render:function(e){return e(f)}}).$mount("#app")},"6bd7":function(e,t,a){},"85ec":function(e,t,a){},c770:function(e,t,a){"use strict";var n=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{directives:[{name:"show",rawName:"v-show",value:1==e.flag,expression:"flag == 1"}],class:e.data.num%2==1?"contentbox":"contentbox1"},[this.openid==e.data.uid?n("div",{directives:[{name:"show",rawName:"v-show",value:1!=e.likeFlag,expression:"likeFlag != 1"}],staticClass:"drop",on:{click:e.drop}},[e._v(" 我要下墙 ")]):e._e(),n("p",{staticClass:"actor-title"},[e._v(" "+e._s(e.data.episode)+"."+e._s(e.data.num)+e._s(e.data.num%2==0?"男神":"女神")+" ")]),n("div",{staticClass:"pic-content"},e._l(e.data.image,(function(e,t){return n("img",{key:t,staticClass:"actor-pic",attrs:{src:e}})})),0),n("div",{staticClass:"main-info"},[n("div",{staticClass:"nickName"},[e._v("昵称:"+e._s(e.data.name))]),n("div",{staticClass:"school"},[e._v("院校:"+e._s(e.data.school))])]),n("div",{staticClass:"sub-info"},[n("div",{staticClass:"age"},[e._v("年龄:"+e._s(e.data.age))]),n("div",{staticClass:"height"},[e._v("身高:"+e._s(e.data.height))]),n("div",{staticClass:"constellation"},[e._v("星座:"+e._s(e.data.star))]),n("div",{staticClass:"place"},[e._v("所在地:"+e._s(e.data.location))])]),n("div",{staticClass:"about-me"},[e._v("关于我:"+e._s(e.data.introduction))]),n("div",{staticClass:"target"},[e._v("我喜欢的TA:"+e._s(e.data.goal))]),1==e.data.isConnect?n("div",{directives:[{name:"show",rawName:"v-show",value:1!=e.likeFlag,expression:"likeFlag != 1"}],staticClass:"connect"},[e._v(" 联系方式:"+e._s(e.data.connect)+" ")]):e._e(),n("div",{staticClass:"like",on:{click:e.like}},[n("img",{class:1==e.isLiked?"heart-anim":"heart",attrs:{src:a("5380")}}),n("span",{directives:[{name:"show",rawName:"v-show",value:e.data.isLiked||e.isLiked,expression:"data.isLiked || isLiked"}],class:(e.isLiked,"likes")},[e._v(e._s(e.data.likes))])]),n("button",{directives:[{name:"show",rawName:"v-show",value:1!=e.likeFlag,expression:"likeFlag != 1"}],staticClass:"get-info",on:{click:e.getInfo}},[e._v(" 获取联系方式 ")]),n("p",{staticClass:"feedback",on:{click:e.feedback}},[e._v("反馈")]),n("div",{directives:[{name:"show",rawName:"v-show",value:e.showFeedback,expression:"showFeedback"}],staticClass:"layer",on:{scroll:function(e){e.stopPropagation(),e.preventDefault()},touchmove:function(e){e.stopPropagation(),e.preventDefault()}}}),n("div",{directives:[{name:"show",rawName:"v-show",value:e.showDrop,expression:"showDrop"}],staticClass:"layer",on:{scroll:function(e){e.stopPropagation(),e.preventDefault()},touchmove:function(e){e.stopPropagation(),e.preventDefault()}}}),n("div",{directives:[{name:"show",rawName:"v-show",value:e.showFeedback,expression:"showFeedback"}],staticClass:"feedback-log",on:{scroll:function(e){e.stopPropagation(),e.preventDefault()},touchmove:function(e){e.stopPropagation(),e.preventDefault()}}},[n("textarea",{directives:[{name:"model",rawName:"v-model",value:e.question,expression:"question"}],staticClass:"question",attrs:{rows:"5",cols:"30",placeholder:"反馈问题"},domProps:{value:e.question},on:{input:function(t){t.target.composing||(e.question=t.target.value)}}}),e._v(" "),n("input",{directives:[{name:"model",rawName:"v-model",value:e.feedConnect,expression:"feedConnect"}],staticClass:"feed-connect",attrs:{type:"text",placeholder:"联系方式(QQ或邮箱等)"},domProps:{value:e.feedConnect},on:{input:function(t){t.target.composing||(e.feedConnect=t.target.value)}}}),n("div",{staticClass:"button-content"},[n("button",{on:{click:e.submit}},[e._v(e._s(e.btnWord))]),n("button",{on:{click:e.cancel}},[e._v("取消")])])]),n("div",{directives:[{name:"show",rawName:"v-show",value:e.showDrop,expression:"showDrop"}],staticClass:"feedback-log",on:{scroll:function(e){e.stopPropagation(),e.preventDefault()},touchmove:function(e){e.stopPropagation(),e.preventDefault()}}},[n("input",{directives:[{name:"model",rawName:"v-model",value:e.mail,expression:"mail"}],staticClass:"feed-connect",attrs:{type:"text",placeholder:"上墙时填写的邮箱"},domProps:{value:e.mail},on:{input:function(t){t.target.composing||(e.mail=t.target.value)}}}),n("div",{staticClass:"button-content"},[n("button",{on:{click:e.submitDrop}},[e._v("下墙")]),n("button",{on:{click:e.cancel}},[e._v("取消")])])])])},s=[],o={name:"ContentBox",props:["data","openid","flag","likeFlag"],data:function(){return{btnWord:"提交",question:"",feedConnect:"",showFeedback:!1,isLiked:!1,mail:"",showDrop:!1}},mounted:function(){},methods:{drop:function(){this.showDrop=!0},like:function(){this.$data.isLiked=!0,0==this.likeFlag?this.axios.post("http://www.scgxtd.cn/public/user/message/like",{ID:this.openid,actorUid:this.data.uid}):1==this.likeFlag&&this.axios.post("http://www.scgxtd.cn/public/user/message/like",{openid:this.openid,actorid:this.data.uid}).then((function(e){-1==e.data.code&&alert("点赞失败")})),console.log(this.openid),""==this.openid&&null==this.openid||this.axios.post("url",{openid:this.openid,actorUid:this.data.uid})},feedback:function(){this.$data.showFeedback=!0},submit:function(){var e=this;this.btnWord="正在提交",this.axios.post("http://www.scgxtd.cn/public/user/suggestion",{question:this.question,connect:this.feedConnect}).then((function(t){e.btnWord="提交",e.$data.showFeedback=!1,0==t.data.code?alert("反馈成功"):-1==t.data.code&&alert("反馈失败"+t.data.msg)})),console.log(this.$data.question),console.log(this.$data.feedConnect),this.$data.showFeedback=!1},submitDrop:function(){this.axios.post("/http://www.scgxtd.cn/public/user/message/shower",{openid:this.openid,email:this.mail}).then((function(e){0==e.data.code?alert("下墙成功"):-1==e.data.code&&alert("下墙失败"+e.data.msg)}))},cancel:function(){this.$data.showFeedback=!1,this.showDrop=!1},getInfo:function(){var e=this;this.axios.post("http://www.scgxtd.cn/public/index/wxpay/getjsparam",{openid:this.openid,actorid:this.data.uid}).then((function(t){"undefined"==typeof WeixinJSBridge?document.addEventListener?document.addEventListener("WeixinJSBridgeReady",e.onBridgeReady,!1):document.attachEvent&&(document.attachEvent("WeixinJSBridgeReady",e.onBridgeReady),document.attachEvent("onWeixinJSBridgeReady",e.onBridgeReady)):e.onBridgeReady(t)})).catch((function(e){console.log(e)}))},onBridgeReady:function(e){WeixinJSBridge.invoke("getBrandWCPayRequest",{appId:e.appId,timeStamp:e.timeStamp,nonceStr:e.nonceStr,package:e.package,signType:"MD5",paySign:e.paySign},(function(e){"get_brand_wcpay_request:ok"==e.err_msg&&alert("支付成功！")}))}}},i=o,c=(a("0c03"),a("2877")),r=Object(c["a"])(i,n,s,!1,null,"2060d9b4",null);t["a"]=r.exports},cab8:function(e,t,a){"use strict";a("6bd7")}});
//# sourceMappingURL=app.fc89698a.js.map