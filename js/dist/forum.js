(()=>{var t={n:o=>{var e=o&&o.__esModule?()=>o.default:()=>o;return t.d(e,{a:e}),e},d:(o,e)=>{for(var n in e)t.o(e,n)&&!t.o(o,n)&&Object.defineProperty(o,n,{enumerable:!0,get:e[n]})},o:(t,o)=>Object.prototype.hasOwnProperty.call(t,o),r:t=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})}},o={};(()=>{"use strict";t.r(o),t.d(o,{extend:()=>S});const e=flarum.core.compat["forum/app"];var n=t.n(e);const s=flarum.core.compat["common/extend"],r=flarum.core.compat["forum/states/DiscussionListState"];var i=t.n(r);const a=flarum.core.compat["forum/components/DiscussionListItem"];var c=t.n(a);const u=flarum.core.compat["common/utils/abbreviateNumber"];var l=t.n(u);const p=flarum.core.compat["common/helpers/icon"];var d=t.n(p);const f=flarum.core.compat["common/components/Button"];var v=t.n(f);const w=flarum.core.compat["forum/utils/DiscussionControls"];var b=t.n(w);function y(t,o){return y=Object.setPrototypeOf?Object.setPrototypeOf.bind():function(t,o){return t.__proto__=o,t},y(t,o)}const h=flarum.core.compat["common/components/Modal"];var _=t.n(h);const g=flarum.core.compat["common/utils/Stream"];var O=t.n(g),C=function(t){function o(){return t.apply(this,arguments)||this}var e,s;s=t,(e=o).prototype=Object.create(s.prototype),e.prototype.constructor=e,y(e,s);var r=o.prototype;return r.oninit=function(o){t.prototype.oninit.call(this,o),this.discussion=this.attrs.discussion,this.currentViewsCount=this.attrs.discussion.views(),this.newViewsCount=O()(this.currentViewsCount)},r.content=function(){return m("div",{className:"Modal-body"},m("div",{className:"Form Form--centered"},m("div",{className:"Form-group"},m("label",null,n().translator.trans("flarumite-simple-discussion-views.forum.modal_resetviews.label")),m("input",{className:"FormControl",type:"number",min:"0",bidi:this.newViewsCount})),m("div",{className:"Form-group"},m(v(),{className:"Button Button--primary",type:"submit",loading:this.loading},n().translator.trans("flarumite-simple-discussion-views.forum.modal_resetviews.submit")))))},r.title=function(){return n().translator.trans("flarumite-simple-discussion-views.forum.modal_resetviews.title")},r.className=function(){return"Modal--small"},r.onsubmit=function(t){var o=this;t.preventDefault(),this.loading=!0;var e=parseInt(this.newViewsCount()),n=this.currentViewsCount;e>=0&&e!==n&&this.attrs.discussion.save({views:e}).then((function(){m.redraw()})).catch((function(t){o.loading=!1,console.warn(t)})),this.hide()},o}(_());const M=flarum.core.compat["common/extenders"];var N=t.n(M);const j=flarum.core.compat["common/models/Discussion"];var x=t.n(j);const S=[new(N().Model)(x()).attribute("canReset").attribute("views")];n().initializers.add("flarumite-simple-discussion-views",(function(){(0,s.extend)(i().prototype,"sortMap",(function(t){t.popular="-view_count",t.unpopular="view_count"})),(0,s.extend)(c().prototype,"infoItems",(function(t){var o=this.attrs.discussion.views();t.add("discussion-views",m("span",null,d()("far fa-eye")," ",l()(o)))})),(0,s.extend)(b(),"moderationControls",(function(t,o){o.canReset()&&t.add("reset",m(v(),{icon:"far fa-eye",onclick:function(){return n().modal.show(C,{discussion:o})}},n().translator.trans("flarumite-simple-discussion-views.forum.discussion_controls.resetviews_button")),-10)}))}))})(),module.exports=o})();
//# sourceMappingURL=forum.js.map