(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-4b5a51c1"],{"1c4f":function(t,e,a){"use strict";a.r(e);var o=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"sign"},[a("p",{staticClass:"title"},[t._v("报名信息")]),a("input",{directives:[{name:"model",rawName:"v-model",value:t.nickName,expression:"nickName"}],staticClass:"nick-name",attrs:{type:"text",placeholder:"昵称"},domProps:{value:t.nickName},on:{input:function(e){e.target.composing||(t.nickName=e.target.value)}}}),a("input",{directives:[{name:"model",rawName:"v-model",value:t.school,expression:"school"}],staticClass:"school",attrs:{type:"text",placeholder:"院校名称"},domProps:{value:t.school},on:{input:function(e){e.target.composing||(t.school=e.target.value)}}}),a("input",{directives:[{name:"model",rawName:"v-model",value:t.age,expression:"age"}],staticClass:"age",attrs:{type:"text",placeholder:"年龄"},domProps:{value:t.age},on:{input:function(e){e.target.composing||(t.age=e.target.value)}}}),a("select",{directives:[{name:"model",rawName:"v-model",value:t.sex,expression:"sex"}],staticClass:"select-box",on:{change:function(e){var a=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){var e="_value"in t?t._value:t.value;return e}));t.sex=e.target.multiple?a:a[0]}}},[a("option",{attrs:{disabled:"",value:""}},[t._v("性别:")]),a("option",{attrs:{value:"男"}},[t._v("男")]),a("option",{attrs:{value:"女"}},[t._v("女")])]),a("input",{directives:[{name:"model",rawName:"v-model",value:t.height,expression:"height"}],attrs:{type:"text",placeholder:"身高(厘米)"},domProps:{value:t.height},on:{input:function(e){e.target.composing||(t.height=e.target.value)}}}),a("input",{directives:[{name:"model",rawName:"v-model",value:t.place,expression:"place"}],attrs:{type:"text",placeholder:"家乡"},domProps:{value:t.place},on:{input:function(e){e.target.composing||(t.place=e.target.value)}}}),a("input",{directives:[{name:"model",rawName:"v-model",value:t.mail,expression:"mail"}],attrs:{type:"text",placeholder:"邮箱"},domProps:{value:t.mail},on:{input:function(e){e.target.composing||(t.mail=e.target.value)}}}),a("input",{directives:[{name:"model",rawName:"v-model",value:t.qq,expression:"qq"}],attrs:{type:"text",placeholder:"联系方式(微信号或手机号)"},domProps:{value:t.qq},on:{input:function(e){e.target.composing||(t.qq=e.target.value)}}}),a("select",{directives:[{name:"model",rawName:"v-model",value:t.constellation,expression:"constellation"}],staticClass:"select-box",attrs:{name:"constellation"},on:{change:function(e){var a=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){var e="_value"in t?t._value:t.value;return e}));t.constellation=e.target.multiple?a:a[0]}}},[a("option",{attrs:{disabled:"",value:""}},[t._v("星座:")]),a("option",{attrs:{value:"白羊座"}},[t._v("白羊座")]),a("option",{attrs:{value:"金牛座"}},[t._v("金牛座")]),a("option",{attrs:{value:"双子座"}},[t._v("双子座")]),a("option",{attrs:{value:"巨蟹座"}},[t._v("巨蟹座")]),a("option",{attrs:{value:"狮子座"}},[t._v("狮子座")]),a("option",{attrs:{value:"处女座"}},[t._v("处女座")]),a("option",{attrs:{value:"天秤座"}},[t._v("天秤座")]),a("option",{attrs:{value:"天蝎座"}},[t._v("天蝎座")]),a("option",{attrs:{value:"射手座"}},[t._v("射手座")]),a("option",{attrs:{value:"摩羯座"}},[t._v("摩羯座")]),a("option",{attrs:{value:"水瓶座"}},[t._v("水瓶座")]),a("option",{attrs:{value:"双鱼座"}},[t._v("双鱼座")])]),a("textarea",{directives:[{name:"model",rawName:"v-model",value:t.about,expression:"about"}],attrs:{cols:"30",rows:"3",placeholder:"关于我(15字以上)"},domProps:{value:t.about},on:{input:function(e){e.target.composing||(t.about=e.target.value)}}}),a("textarea",{directives:[{name:"model",rawName:"v-model",value:t.target,expression:"target"}],attrs:{cols:"30",rows:"3",placeholder:"我喜欢的TA(15字以上)"},domProps:{value:t.target},on:{input:function(e){e.target.composing||(t.target=e.target.value)}}}),a("select",{directives:[{name:"model",rawName:"v-model",value:t.type,expression:"type"}],staticClass:"select-box",on:{change:function(e){var a=Array.prototype.filter.call(e.target.options,(function(t){return t.selected})).map((function(t){var e="_value"in t?t._value:t.value;return e}));t.type=e.target.multiple?a:a[0]}}},[a("option",{attrs:{disabled:"",value:""}},[t._v("活动类型:")]),a("option",{attrs:{value:""}},[t._v("报名上墙")]),a("option",{attrs:{value:""}},[t._v("参加互选")])]),a("p",[t._v("上传照片:")]),a("p",[t._v("(先提交信息才能上传照片)")]),a("p",{directives:[{name:"show",rawName:"v-show",value:t.showUp,expression:"showUp"}]},[t._v("照片上传完毕请确认报名")]),a("AntdUp",{directives:[{name:"show",rawName:"v-show",value:t.showUp,expression:"showUp"}],staticClass:"ant"}),a("button",{staticClass:"submit",on:{click:t.submit}},[t._v("提交信息")]),a("button",{directives:[{name:"show",rawName:"v-show",value:t.showUp,expression:"showUp"}],staticClass:"submit",on:{click:t.submit2}},[t._v("完成报名")]),a("div",{directives:[{name:"show",rawName:"v-show",value:t.alert,expression:"alert"}],staticClass:"alert",on:{touchmove:function(t){t.stopPropagation(),t.preventDefault()}}},[a("p",{staticClass:"title"},[t._v("提示")]),a("p",{staticClass:"content"},[t._v(t._s(t.alertContent))]),a("button",{staticClass:"ok",on:{click:t.close}},[t._v("好的")])]),a("div",{directives:[{name:"show",rawName:"v-show",value:t.alert,expression:"alert"}],staticClass:"layer",on:{touchmove:function(t){t.stopPropagation(),t.preventDefault()}}})],1)},i=[],n=(a("c975"),a("a9e3"),function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("a-upload",{staticClass:"upload-list-inline",attrs:{accept:".jpeg,.png",action:"http://www.scgxtd.cn/public/user/upload/picture","list-type":"picture","default-file-list":t.fileList}},[a("a-button",[a("a-icon",{attrs:{type:"upload"}}),t._v(" 上传 ")],1)],1)],1)}),s=[],l={data:function(){return{fileList:[]}}},r=l,c=(a("660c"),a("2877")),u=Object(c["a"])(r,n,s,!1,null,"61179d6d",null),p=u.exports,v={mounted:function(){this.openid=localStorage.getItem("openid"),console.log(this.openid)},name:"Sign",components:{AntdUp:p},methods:{update:function(t){var e=this,a=t.target.files[0],o=new FormData;o.append("file",a),o.append("openid",this.openid),console.log(o.get("file")),console.log(o.get("openid"));var i={headers:{"Content-Type":"multipart/form-data"}};this.axios.post("url",o,i).then((function(t){0===t.data.code&&(e.ImgUrl=t.data.data),console.log(t.data)}))},preview:function(){console.log("preview")},exceed:function(){console.log("exceed")},oversize:function(){console.log("oversize")},submit2:function(){},submit:function(){var t=this;return""==this.nickName||""==this.school||""==this.age||""==this.height||""==this.place||""==this.about||""==this.target||""==this.mail||""==this.qq?(this.alertContent="您还有信息没有填完!",void(this.alert=!0)):this.nickName.length>10?(this.alertContent="昵称太长了!",void(this.alert=!0)):this.school.length>15?(this.alertContent="学校名字太长了!",void(this.alert=!0)):isNaN(Number(this.age))?(this.alertContent="输入的年龄不是数字!",void(this.alert=!0)):isNaN(Number(this.height))?(this.alertContent="输入的身高不是数字!",void(this.alert=!0)):this.place.length>10?(this.alertContent="家乡请简略一些",void(this.alert=!0)):this.about.length<15?(this.alertContent="关于您请说详细一些",void(this.alert=!0)):this.target.length<15?(this.alertContent="请再详细一些描述您喜欢的TA",void(this.alert=!0)):this.about.length>100?(this.alertContent="关于您的内容请简略一些噢",void(this.alert=!0)):this.target.length>100?(this.alertContent="关于您喜欢的TA，请简略一些噢",void(this.alert=!0)):this.mail.length>50?(this.alertContent="没有这么长的邮箱吧",void(this.alert=!0)):this.qq.length>20?(this.alertContent="没有这么长的qq号吧",void(this.alert=!0)):-1==this.mail.indexOf("@")?(this.alertContent="邮箱格式不正确",void(this.alert=!0)):void this.axios.post("http://www.scgxtd.cn/public/user/upload/",{nickName:this.nickName,openid:localStorage.getItem("openid"),sex:this.sex,school:this.school,age:this.age,height:this.height,constellation:this.constellation,place:this.place,mail:this.mail,connect:this.qq,about:this.about,target:this.target}).then((function(e){0==e.code?t.showUp=!0:-1==e.code&&alert("报名失败")}))},close:function(){this.$data.alert=!1}},data:function(){return{type:"",files:[],nickName:"",sex:"",school:"",age:"",height:"",constellation:"",place:"",mail:"",qq:"",about:"",target:"",openid:"testid",alertContent:"",alert:!1,showUp:!1}}},h=v,d=(a("96eb"),Object(c["a"])(h,o,i,!1,null,"33eb3221",null));e["default"]=d.exports},5899:function(t,e){t.exports="\t\n\v\f\r                　\u2028\u2029\ufeff"},"58a8":function(t,e,a){var o=a("1d80"),i=a("5899"),n="["+i+"]",s=RegExp("^"+n+n+"*"),l=RegExp(n+n+"*$"),r=function(t){return function(e){var a=String(o(e));return 1&t&&(a=a.replace(s,"")),2&t&&(a=a.replace(l,"")),a}};t.exports={start:r(1),end:r(2),trim:r(3)}},"660c":function(t,e,a){"use strict";a("9847")},7156:function(t,e,a){var o=a("861d"),i=a("d2bb");t.exports=function(t,e,a){var n,s;return i&&"function"==typeof(n=e.constructor)&&n!==a&&o(s=n.prototype)&&s!==a.prototype&&i(t,s),t}},"96eb":function(t,e,a){"use strict";a("db08")},9847:function(t,e,a){},a9e3:function(t,e,a){"use strict";var o=a("83ab"),i=a("da84"),n=a("94ca"),s=a("6eeb"),l=a("5135"),r=a("c6b6"),c=a("7156"),u=a("c04e"),p=a("d039"),v=a("7c73"),h=a("241c").f,d=a("06cf").f,m=a("9bf2").f,g=a("58a8").trim,f="Number",w=i[f],N=w.prototype,b=r(v(N))==f,x=function(t){var e,a,o,i,n,s,l,r,c=u(t,!1);if("string"==typeof c&&c.length>2)if(c=g(c),e=c.charCodeAt(0),43===e||45===e){if(a=c.charCodeAt(2),88===a||120===a)return NaN}else if(48===e){switch(c.charCodeAt(1)){case 66:case 98:o=2,i=49;break;case 79:case 111:o=8,i=55;break;default:return+c}for(n=c.slice(2),s=n.length,l=0;l<s;l++)if(r=n.charCodeAt(l),r<48||r>i)return NaN;return parseInt(n,o)}return+c};if(n(f,!w(" 0o1")||!w("0b1")||w("+0x1"))){for(var _,C=function(t){var e=arguments.length<1?0:t,a=this;return a instanceof C&&(b?p((function(){N.valueOf.call(a)})):r(a)!=f)?c(new w(x(e)),a,C):x(e)},y=o?h(w):"MAX_VALUE,MIN_VALUE,NaN,NEGATIVE_INFINITY,POSITIVE_INFINITY,EPSILON,isFinite,isInteger,isNaN,isSafeInteger,MAX_SAFE_INTEGER,MIN_SAFE_INTEGER,parseFloat,parseInt,isInteger".split(","),I=0;y.length>I;I++)l(w,_=y[I])&&!l(C,_)&&m(C,_,d(w,_));C.prototype=N,N.constructor=C,s(i,f,C)}},db08:function(t,e,a){}}]);
//# sourceMappingURL=chunk-4b5a51c1.8f5d0ef6.js.map