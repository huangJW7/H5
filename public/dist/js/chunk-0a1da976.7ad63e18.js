(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-0a1da976"],{"00b4":function(e,t,a){},"1c4f":function(e,t,a){"use strict";a.r(t);var l=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"sign"},[a("div",{directives:[{name:"show",rawName:"v-show",value:!e.showForm,expression:"!showForm"}],staticStyle:{"padding-top":"280px"}},[a("el-button",{staticStyle:{width:"150px",height:"60px","font-size":"16px"},attrs:{type:"primary"},on:{click:function(t){return e.setType(1)}}},[e._v("报名上墙")]),a("br"),a("el-button",{staticStyle:{"margin-top":"50px",width:"150px",height:"60px","font-size":"16px"},attrs:{type:"primary"},on:{click:function(t){return e.setType(2)}}},[e._v("报名活动")])],1),a("div",{directives:[{name:"show",rawName:"v-show",value:e.showForm,expression:"showForm"}]},[a("p",{staticClass:"title"},[e._v("报名信息")]),a("el-checkbox",{staticStyle:{"margin-bottom":"10px"},model:{value:e.protocol,callback:function(t){e.protocol=t},expression:"protocol"}},[e._v("我同意"),a("a",{attrs:{href:"http://proscgxtd.mikecrm.com/yEcnDBX"}},[e._v("支付保护计划及用户协议")]),a("span",{staticClass:"red"},[e._v(" *")])]),e._m(0),a("el-input",{staticClass:"def-input",attrs:{type:"text",placeholder:"昵称"},model:{value:e.nickName,callback:function(t){e.nickName=t},expression:"nickName"}}),e._m(1),a("el-input",{staticClass:"def-input",attrs:{placeholder:"年龄"},model:{value:e.age,callback:function(t){e.age=t},expression:"age"}}),e._m(2),a("el-select",{attrs:{placeholder:"请选择性别"},model:{value:e.sexVal,callback:function(t){e.sexVal=t},expression:"sexVal"}},e._l(e.sex,(function(e){return a("el-option",{key:e.value,attrs:{label:e.label,value:e.value,disabled:e.disabled}})})),1),e._m(3),a("el-input",{staticClass:"def-input",attrs:{placeholder:"cm"},model:{value:e.height,callback:function(t){e.height=t},expression:"height"}}),e._m(4),a("el-input",{staticClass:"def-input",attrs:{type:"textarea",rows:3,placeholder:"十五字以内"},model:{value:e.place,callback:function(t){e.place=t},expression:"place"}}),e._m(5),a("el-select",{attrs:{placeholder:"请选择学历"},model:{value:e.edu,callback:function(t){e.edu=t},expression:"edu"}},e._l(e.eduList,(function(e){return a("el-option",{key:e.value,attrs:{label:e.label,value:e.value,disabled:e.disabled}})})),1),e._m(6),a("p",{staticStyle:{margin:"5px"}},[e._v("(如列表中没有您的院校，请手动输入)")]),a("el-select",{attrs:{filterable:"","allow-create":"",placeholder:"请选择院校，输入可以搜索"},model:{value:e.school,callback:function(t){e.school=t},expression:"school"}},e._l(e.schoolList,(function(e){return a("el-option",{key:e.value,attrs:{label:e.label,value:e.value}})})),1),e._m(7),a("el-input",{staticClass:"def-input",attrs:{placeholder:"邮箱"},model:{value:e.mail,callback:function(t){e.mail=t},expression:"mail"}}),e._m(8),a("el-input",{staticClass:"def-input",attrs:{placeholder:"例:  微信:****"},model:{value:e.qq,callback:function(t){e.qq=t},expression:"qq"}}),e._m(9),a("el-select",{attrs:{placeholder:"请选择星座"},model:{value:e.constellation,callback:function(t){e.constellation=t},expression:"constellation"}},e._l(e.constellationList,(function(e){return a("el-option",{key:e.value,attrs:{label:e.label,value:e.value,disabled:e.disabled}})})),1),e._m(10),a("el-input",{staticClass:"def-input",attrs:{type:"textarea",cols:"30",rows:3,placeholder:"让TA更了解你"},model:{value:e.about,callback:function(t){e.about=t},expression:"about"}}),e._m(11),a("el-input",{staticClass:"def-input",attrs:{type:"textarea",cols:"30",rows:3,placeholder:"心动条件有助于筛选更合适的TA"},model:{value:e.target,callback:function(t){e.target=t},expression:"target"}}),a("p"),a("el-button",{directives:[{name:"show",rawName:"v-show",value:e.showSubmitBtn,expression:"showSubmitBtn"}],staticStyle:{"margin-bottom":"5px"},attrs:{type:"primary"},on:{click:e.submit}},[e._v("下一步")]),a("el-upload",{directives:[{name:"show",rawName:"v-show",value:e.showNormalUp,expression:"showNormalUp"}],ref:"upload1",staticClass:"upload-demo",staticStyle:{"margin-top":"15px"},attrs:{action:"http://www.scgxtd.cn/public/user/upload/picture",data:e.imgData,"on-preview":e.handlePreview,"on-remove":e.handleRemove,"on-success":e.handleSuccess,"file-list":e.fileList1,"before-upload":e.beforeImgUpload,"list-type":"picture",accept:"image/*","auto-upload":!1}},[a("el-button",{attrs:{slot:"trigger",size:"small",type:"primary"},slot:"trigger"},[e._v("选择上墙照片")]),a("el-button",{staticStyle:{"margin-left":"10px"},attrs:{size:"small",type:"success"},on:{click:e.submitImgUpload1}},[e._v("确认上传")]),a("div",{staticClass:"el-upload__tip",staticStyle:{"margin-top":"5px","margin-bottom":"5px"},attrs:{slot:"tip"},slot:"tip"},[e._v("JPG，PNG格式，大小不得超过3M")])],1),a("el-upload",{directives:[{name:"show",rawName:"v-show",value:e.showActUp,expression:"showActUp"}],ref:"upload2",staticClass:"upload-demo",attrs:{action:"http://www.scgxtd.cn/public/user/upload/actpicture",data:e.imgMatchData,"on-preview":e.handlePreview,"on-remove":e.handleRemove,"on-success":e.handleSuccess,"file-list":e.fileList2,"before-upload":e.beforeImgUpload,"list-type":"picture",accept:"image/*","auto-upload":!1}},[a("el-button",{attrs:{slot:"trigger",size:"small",type:"primary"},slot:"trigger"},[e._v("选择匹配照片")]),a("el-button",{staticStyle:{"margin-left":"10px"},attrs:{size:"small",type:"success"},on:{click:e.submitImgUpload2}},[e._v("确认上传")]),a("div",{staticClass:"el-upload__tip",staticStyle:{"margin-top":"5px","margin-bottom":"5px"},attrs:{slot:"tip"},slot:"tip"},[e._v("JPG，PNG格式，大小不得超过3M")])],1),a("el-upload",{directives:[{name:"show",rawName:"v-show",value:e.showNormalUp,expression:"showNormalUp"}],ref:"upload3",staticClass:"upload-demo",attrs:{action:"http://www.scgxtd.cn/public/user/upload/picture",data:e.eduImgData,"on-preview":e.handlePreview,"on-remove":e.handleRemove,"on-success":e.handleSuccess,"file-list":e.eduFileList,limit:1,"before-upload":e.beforeImgUpload,"list-type":"picture",accept:"image/*","auto-upload":!1}},[a("el-button",{attrs:{slot:"trigger",size:"small",type:"primary"},slot:"trigger"},[e._v("选择学历证明")]),a("el-button",{staticStyle:{"margin-left":"10px"},attrs:{size:"small",type:"success"},on:{click:e.submitImgUpload3}},[e._v("确认上传")]),a("div",{staticClass:"el-upload__tip",attrs:{slot:"tip"},slot:"tip"},[e._v(" 毕业证，学生证或学信网截图，大小不得超过3m。需要保证院校，照片，姓名，学号清晰，实拍高清原图，勿用扫描件。请认真对待学历信息，若上传不符合要求，报名将无效且无邮件通知 ")])],1),a("el-upload",{directives:[{name:"show",rawName:"v-show",value:e.showActUp,expression:"showActUp"}],ref:"upload4",staticClass:"upload-demo",attrs:{action:"http://www.scgxtd.cn/public/user/upload/actpicture",data:e.eduMatchData,"on-preview":e.handlePreview,"on-remove":e.handleRemove,"on-success":e.handleSuccess,"file-list":e.eduFileList,limit:1,"before-upload":e.beforeImgUpload,"list-type":"picture",accept:"image/*","auto-upload":!1}},[a("el-button",{attrs:{slot:"trigger",size:"small",type:"primary"},slot:"trigger"},[e._v("选择学历证明")]),a("el-button",{staticStyle:{"margin-left":"10px"},attrs:{size:"small",type:"success"},on:{click:e.submitImgUpload4}},[e._v("确认上传")]),a("div",{staticClass:"el-upload__tip",attrs:{slot:"tip"},slot:"tip"},[e._v(" 毕业证，学生证或学信网截图，大小不得超过3m。需要保证院校，照片，姓名，学号清晰，实拍高清原图，勿用扫描件。请认真对待学历信息，若上传不符合要求，报名将无效且无邮件通知 ")])],1),a("el-button",{directives:[{name:"show",rawName:"v-show",value:e.showActUp||e.showNormalUp,expression:"showActUp||showNormalUp"}],attrs:{type:"danger"},on:{click:e.submit2}},[e._v("报名")])],1)])},s=[function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("p",{staticClass:"sub-title"},[e._v("昵称:"),a("span",{staticClass:"red"},[e._v(" *")])])},function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("p",{staticClass:"sub-title"},[e._v("年龄:"),a("span",{staticClass:"red"},[e._v(" *")])])},function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("p",{staticClass:"sub-title"},[e._v("性别:"),a("span",{staticClass:"red"},[e._v(" *")])])},function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("p",{staticClass:"sub-title"},[e._v("身高:"),a("span",{staticClass:"red"},[e._v(" *")])])},function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("p",{staticClass:"sub-title",staticStyle:{right:"85px"}},[e._v(" 家乡及所在地:"),a("span",{staticClass:"red"},[e._v(" *")])])},function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("p",{staticClass:"sub-title"},[e._v("学历:"),a("span",{staticClass:"red"},[e._v(" *")])])},function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("p",{staticClass:"sub-title"},[e._v("院校:"),a("span",{staticClass:"red"},[e._v(" *")])])},function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("p",{staticClass:"sub-title"},[e._v("邮箱:"),a("span",{staticClass:"red"},[e._v(" *")])])},function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("p",{staticClass:"sub-title",staticStyle:{right:"110px"}},[e._v("微信或qq:"),a("span",{staticClass:"red"},[e._v(" *")])])},function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("p",{staticClass:"sub-title"},[e._v("星座:"),a("span",{staticClass:"red"},[e._v(" *")])])},function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("p",{staticClass:"sub-title",staticStyle:{right:"115px"}},[e._v("关于我:"),a("span",{staticClass:"red"},[e._v(" *")])])},function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("p",{staticClass:"sub-title",staticStyle:{right:"100px"}},[e._v("我喜欢的TA:"),a("span",{staticClass:"red"},[e._v(" *")])])}],i=(a("a9e3"),{mounted:function(){this.openid=sessionStorage.getItem("openid"),this.eduMatchData.id=this.openid,this.eduImgData.id=this.openid,this.imgData.id=this.openid,this.imgMatchData.id=this.openid,console.log(this.openid)},name:"Sign",methods:{submitImgUpload1:function(){this.$refs.upload1.submit()},submitImgUpload2:function(){this.$refs.upload2.submit()},submitImgUpload3:function(){this.$refs.upload3.submit()},submitImgUpload4:function(){this.$refs.upload4.submit()},update:function(e){var t=this,a=e.target.files[0],l=new FormData;l.append("file",a),l.append("openid",this.openid),console.log(l.get("file")),console.log(l.get("openid"));var s={headers:{"Content-Type":"multipart/form-data"}};this.axios.post("url",l,s).then((function(e){0===e.data.code&&(t.ImgUrl=e.data.data),console.log(e.data)}))},handleRemove:function(e,t){console.log(e,t)},handlePreview:function(e){console.log(e)},beforeImgUpload:function(e){var t="image/jpeg"===e.type||"image/png"===e.type,a=e.size/1024/1024<3;return t||this.$message.error("上传图片只能是 JPG，PNG 格式!"),a||this.$message.error("图片大小不能超过 3MB! 请适当截取图片后重试"),t&&a},handleSuccess:function(e,t,a){console.log(e,t,a)},preview:function(){console.log("preview")},exceed:function(){console.log("exceed")},oversize:function(){console.log("oversize")},submit2:function(){this.$notify({title:"报名成功",dangerouslyUseHTMLString:!0,message:'<p style="margin:0px">请添加小助手微信：trymain</p><p style="margin:0px">验证</p>',duration:5e3})},setType:function(e){this.type=e,this.showForm=!0},submit:function(){var e=this;console.log(this.type),this.eduImgData.id=sessionStorage.getItem("openid"),this.imgData.id=sessionStorage.getItem("openid"),this.imgMatchData.id=sessionStorage.getItem("openid"),""!=this.nickName&&""!=this.school&&""!=this.edu&&""!=this.age&&""!=this.sexVal&&""!=this.height&&""!=this.place&&""!=this.about&&""!=this.constellation&&""!=this.target&&""!=this.mail&&""!=this.qq?0!=this.protocol?this.nickName.length>10?this.$message("昵称过长!"):isNaN(Number(this.age))?this.$message("输入的年龄不是数字!"):isNaN(Number(this.height))?this.$message("输入的身高不是数字!"):this.height.length>3?this.$message("身高非法！"):this.place.length>14?this.$message("请简略一些所在地描述"):this.about.length<15?this.$message("请用15个以上文字描述您"):this.target.length<15?this.$message("请用15个以上文字描述您的心动条件"):this.about.length>1e3?this.$message("关于您的描述请简略一些"):this.target.length>1e3?this.$message("您的心动条件请简略一些"):this.mail.length>30?this.$message("邮箱过长"):this.qq.length>100?this.$message("联系方式过长"):-1!=this.mail.indexOf("@")?1==this.type?this.axios.post("http://www.scgxtd.cn/public/user/upload/normal",{nickName:this.nickName,openid:sessionStorage.getItem("openid"),sex:this.sexVal,school:this.school,age:this.age,height:this.height,constellation:this.constellation,place:this.place,mail:this.mail,connect:this.qq,about:this.about,target:this.target,background:this.edu}).then((function(t){console.log(t),0==t.data.code?(e.$message("提交成功"),e.showUp=!0,e.showNormalUp=!0,e.showSubmitBtn=!1):-1==t.data.code&&e.$message("报名失败，"+t.data.msg)})):2==this.type&&this.axios.post("http://www.scgxtd.cn/public/user/upload/active",{nickName:this.nickName,openid:sessionStorage.getItem("openid"),sex:this.sexVal,school:this.school,age:this.age,height:this.height,constellation:this.constellation,place:this.place,mail:this.mail,connect:this.qq,about:this.about,target:this.target,background:this.edu}).then((function(t){console.log(t),0==t.data.code?(e.$message("提交成功"),e.showUp=!0,e.showActUp=!0,e.showSubmitBtn=!1):-1==t.data.code&&e.$message("报名失败，"+t.data.msg)})):this.$message("邮箱格式不正确"):this.$message("请先同意用户协议"):this.$message("还有信息未填完")},close:function(){this.$data.alert=!1}},data:function(){return{showForm:!1,showSubmitBtn:!0,showNormalUp:!1,showActUp:!1,protocol:!1,type:"",files:[],eduFileList:[],fileList1:[],fileList2:[],nickName:"",sex:[{value:"男",label:"男生"},{value:"女",label:"女生"}],eduImgData:{type:"2",id:this.openid},eduMatchData:{type:"3",id:this.openid},imgData:{type:"0",id:this.openid},imgMatchData:{type:"1",id:this.openid},sexVal:"",age:"",height:"",constellation:"",place:"",mail:"",qq:"",about:"",target:"",openid:"testid",showUp:!1,defVal:"",options:[{value:"选项1",label:"标签1"}],constellationList:[{value:"白羊座",label:"白羊座"},{value:"金牛座",label:"金牛座"},{value:"双子座",label:"双子座"},{value:"巨蟹座",label:"巨蟹座"},{value:"狮子座",label:"狮子座"},{value:"处女座",label:"处女座"},{value:"天秤座",label:"天秤座"},{value:"天蝎座",label:"天蝎座"},{value:"射手座",label:"射手座"},{value:"摩羯座",label:"摩羯座"},{value:"水瓶座",label:"水瓶座"},{value:"双鱼座",label:"双鱼座"}],edu:"",eduList:[{value:"专",label:"专"},{value:"本",label:"本"},{value:"硕",label:"硕"},{value:"博",label:"博"}],school:"",schoolList:[{value:"电子科技大学",label:"电子科技大学"},{value:"西南财经大学",label:"西南财经大学"},{value:"重庆大学",label:"重庆大学"},{value:"四川大学",label:"四川大学"},{value:"四川农业大学",label:"四川农业大学"},{value:"四川师范大学",label:"四川师范大学"},{value:"四川音乐学院",label:"四川音乐学院"},{value:"四川传媒学院",label:"四川传媒学院"},{value:"四川文理学院",label:"四川文理学院"},{value:"四川警察学院",label:"四川警察学院"},{value:"四川美术学院",label:"四川美术学院"},{value:"四川旅游学院",label:"四川旅游学院"},{value:"四川轻化工大学",label:"四川轻化工大学"},{value:"四川外国语大学",label:"四川外国语大学"},{value:"四川大学锦江学院",label:"四川大学锦江学院"},{value:"四川大学锦城学院",label:"四川大学锦城学院"},{value:"四川外国语大学成都学院",label:"四川外国语大学成都学院"},{value:"成都大学",label:"成都大学"},{value:"成都医学院",label:"成都医学院"},{value:"成都师范学院",label:"成都师范学院"},{value:"成都体育学院",label:"成都体育学院"},{value:"成都理工大学",label:"成都理工大学"},{value:"成都中医药大学",label:"成都中医药大学"},{value:"成都信息工程大学",label:"成都信息工程大学"},{value:"重庆工商大学",label:"重庆工商大学"},{value:"重庆医科大学",label:"重庆医科大学"},{value:"重庆邮电大学",label:"重庆邮电大学"},{value:"重庆交通大学",label:"重庆交通大学"},{value:"重庆理工大学",label:"重庆理工大学"},{value:"重庆师范大学",label:"重庆师范大学"},{value:"西南大学",label:"西南大学"},{value:"西南交通大学",label:"西南交通大学"},{value:"西华大学",label:"西华大学"},{value:"西华师范大学",label:"西华师范大学"},{value:"西昌学院",label:"西昌学院"},{value:"西南政法大学",label:"西南政法大学"},{value:"西南医科大学",label:"西南医科大学"},{value:"西南石油大学",label:"西南石油大学"},{value:"西南科技大学",label:"西南科技大学"},{value:"西南财经大学天府学院",label:"西南财经大学天府学院"},{value:"电子科技大学成都学院",label:"电子科技大学成都学院"},{value:"中国民用航空飞行学院",label:"中国民用航空飞行学院"},{value:"川北医学院",label:"川北医学院"},{value:"攀枝花学院",label:"攀枝花学院"},{value:"绵阳师范学院",label:"绵阳师范学院"},{value:"内江师范学院",label:"内江师范学院"},{value:"乐山师范学院",label:"乐山师范学院"},{value:"宜宾学院",label:"宜宾学院"}]}}}),o=i,n=(a("f510"),a("2877")),c=Object(n["a"])(o,l,s,!1,null,"6a6bb218",null);t["default"]=c.exports},f510:function(e,t,a){"use strict";a("00b4")}}]);
//# sourceMappingURL=chunk-0a1da976.7ad63e18.js.map