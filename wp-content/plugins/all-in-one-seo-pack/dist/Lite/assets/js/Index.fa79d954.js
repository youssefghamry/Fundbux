import{C as s}from"./index.cf60653e.js";import{G as i,a as o}from"./Row.830f6397.js";import{a as l}from"./Caret.6d7f2e24.js";import{n as u}from"./_plugin-vue2_normalizer.61652a7c.js";const c={components:{CoreAlert:s,GridColumn:i,GridRow:o,SvgCircleCheck:l},props:{type:{type:Number,default(){return 1},validator(a){return[1,2,3,4,5].includes(a)}},featureList:Array,sameTab:Boolean,ctaButtonAction:Boolean,ctaButtonLoading:Boolean,ctaLink:{type:String,required:!1},learnMoreLink:{type:String,required:!1},buttonText:{type:String,required:!1},floating:{type:Boolean,default(){return!0}},showLink:{type:Boolean,default(){return!0}},ctaButtonVisible:{type:Boolean,default(){return!0}},ctaButtonVisibleWarning:String,alignTop:{type:Boolean,default(){return!1}}},data(){return{target:"_blank",strings:{upgradeToPro:this.$t.sprintf(this.$t.__("Upgrade to %1$s",this.$td),"Pro"),ctaHeader:this.$t.sprintf(this.$t.__("This feature is only available for licensed %1$s %2$s users.",this.$td),"AIOSEO","Pro"),ctaDescription:this.$t.sprintf(this.$t.__("%1$s %2$s comes with many additional features to help take your site's SEO to the next level!",this.$td),"AIOSEO","Pro"),learnMoreAllFeatures:this.$t.__("Learn more about all features",this.$td),seeAllFeatures:this.$t.__("See all features",this.$td)}}},methods:{ctaButtonClick(a){this.ctaButtonAction&&(a.preventDefault(),this.$emit("cta-button-click"))}},mounted(){this.sameTab&&(this.target="_self")}};var _=function(){var t=this,e=t._self._c;return e("div",{staticClass:"aioseo-cta",class:{floating:t.floating,"align-top":t.alignTop}},[e("div",{staticClass:"aioseo-cta-background"},[t.type===1?e("div",{staticClass:"type-1"},[e("div",{staticClass:"header-text"},[t._t("header-text",function(){return[t._v(" "+t._s(t.strings.ctaHeader)+" ")]})],2),e("div",{staticClass:"description"},[t._t("description",function(){return[t._v(" "+t._s(t.strings.ctaDescription)+" ")]})],2),t.featureList?e("grid-row",{staticClass:"feature-list"},t._l(t.featureList,function(r,n){return e("grid-column",{key:n,attrs:{md:"6"}},[e("svg-circle-check"),t._v(" "+t._s(r)+" ")],1)}),1):t._e(),!t.ctaButtonVisible&&t.ctaButtonVisibleWarning?e("core-alert",{attrs:{type:"yellow"},domProps:{innerHTML:t._s(t.ctaButtonVisibleWarning)}}):t._e(),t.ctaButtonVisible?e("base-button",{attrs:{type:"green",tag:"a",href:t.ctaLink,target:t.target,loading:t.ctaButtonLoading},nativeOn:{click:function(r){return t.ctaButtonClick.apply(null,arguments)}}},[t._v(" "+t._s(t.buttonText)+" ")]):t._e(),t.showLink?e("a",{staticClass:"learn-more",attrs:{href:t.learnMoreLink,target:"_blank"}},[t._t("learn-more-text",function(){return[t._v(" "+t._s(t.strings.learnMoreAllFeatures)+" ")]})],2):t._e()],1):t._e(),t.type===2?e("div",{staticClass:"type-2"},[e("div",[e("div",{staticClass:"header-text"},[t._t("header-text",function(){return[t._v(" "+t._s(t.strings.ctaHeader)+" ")]})],2),e("div",{staticClass:"description"},[t._t("description",function(){return[t._v(" "+t._s(t.strings.ctaDescription)+" ")]})],2),t.featureList&&t.featureList.length<=5?e("grid-row",{staticClass:"feature-list"},t._l(t.featureList,function(r,n){return e("grid-column",{key:n,attrs:{md:"12"}},[e("svg-circle-check"),t._v(" "+t._s(r)+" ")],1)}),1):t._e(),t.featureList&&t.featureList.length>5?e("grid-row",{staticClass:"feature-list"},t._l(t.featureList,function(r,n){return e("grid-column",{key:n,attrs:{md:"6"}},[e("svg-circle-check"),t._v(" "+t._s(r)+" ")],1)}),1):t._e(),!t.ctaButtonVisible&&t.ctaButtonVisibleWarning?e("core-alert",{attrs:{type:"yellow"},domProps:{innerHTML:t._s(t.ctaButtonVisibleWarning)}}):t._e(),t.ctaButtonVisible?e("base-button",{attrs:{type:"green",tag:"a",href:t.ctaLink,target:t.target,loading:t.ctaButtonLoading},nativeOn:{click:function(r){return t.ctaButtonClick.apply(null,arguments)}}},[t._v(" "+t._s(t.buttonText)+" ")]):t._e(),e("br"),e("br"),t.showLink?e("a",{staticClass:"learn-more",attrs:{href:t.learnMoreLink,target:"_blank"}},[t._t("learn-more-text",function(){return[t._v(" "+t._s(t.strings.learnMoreAllFeatures)+" ")]})],2):t._e()],1),e("div",{staticClass:"featured-image"},[t._t("featured-image")],2)]):t._e(),t.type===3?e("div",{staticClass:"type-3"},[e("div",{staticClass:"sub-header"},[t._v(" "+t._s(t.strings.upgradeToPro)+" ")]),e("div",{staticClass:"header-text"},[t._t("header-text",function(){return[t._v(" "+t._s(t.strings.ctaHeader)+" ")]})],2),t.featureList?e("grid-row",{staticClass:"feature-list"},t._l(t.featureList,function(r,n){return e("grid-column",{key:n,attrs:{md:"6"}},[e("svg-circle-check"),t._v(" "+t._s(r)+" ")],1)}),1):t._e(),!t.ctaButtonVisible&&t.ctaButtonVisibleWarning?e("core-alert",{attrs:{type:"yellow"},domProps:{innerHTML:t._s(t.ctaButtonVisibleWarning)}}):t._e(),t.ctaButtonVisible?e("base-button",{attrs:{type:"green",tag:"a",href:t.ctaLink,target:t.target,loading:t.ctaButtonLoading,size:"medium"},nativeOn:{click:function(r){return t.ctaButtonClick.apply(null,arguments)}}},[t._v(" "+t._s(t.buttonText)+" ")]):t._e(),t.showLink?e("base-button",{attrs:{type:"gray",tag:"a",href:t.learnMoreLink,target:"_blank",size:"medium"}},[t._t("learn-more-text",function(){return[t._v(" "+t._s(t.strings.seeAllFeatures)+" ")]})],2):t._e()],1):t._e(),t.type===4?e("div",{staticClass:"type-4"},[e("div",{staticClass:"header-text"},[t._t("header-text",function(){return[t._v(" "+t._s(t.strings.ctaHeader)+" ")]})],2),e("div",{staticClass:"description"},[t._t("description",function(){return[t._v(" "+t._s(t.strings.ctaDescription)+" ")]})],2)]):t._e()])])},d=[],g=u(c,_,d,!1,null,null,null,null);const h=g.exports;export{h as C};
