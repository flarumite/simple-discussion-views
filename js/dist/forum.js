module.exports=function(t){var e={};function o(n){if(e[n])return e[n].exports;var r=e[n]={i:n,l:!1,exports:{}};return t[n].call(r.exports,r,r.exports,o),r.l=!0,r.exports}return o.m=t,o.c=e,o.d=function(t,e,n){o.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},o.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},o.t=function(t,e){if(1&e&&(t=o(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(o.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)o.d(n,r,function(e){return t[e]}.bind(null,r));return n},o.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return o.d(e,"a",e),e},o.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},o.p="",o(o.s=11)}([function(t,e){t.exports=flarum.core.compat.app},function(t,e){t.exports=flarum.core.compat.extend},function(t,e){t.exports=flarum.core.compat["components/Button"]},function(t,e){t.exports=flarum.core.compat.Model},function(t,e){t.exports=flarum.core.compat["models/Discussion"]},function(t,e){t.exports=flarum.core.compat["states/DiscussionListState"]},function(t,e){t.exports=flarum.core.compat["components/DiscussionListItem"]},function(t,e){t.exports=flarum.core.compat["utils/abbreviateNumber"]},function(t,e){t.exports=flarum.core.compat["utils/DiscussionControls"]},function(t,e){t.exports=flarum.core.compat["components/Modal"]},function(t,e){t.exports=flarum.core.compat["utils/Stream"]},function(t,e,o){"use strict";o.r(e);var n=o(0),r=o.n(n),s=o(1),i=o(5),a=o.n(i),u=o(3),c=o.n(u),l=o(4),p=o.n(l),f=o(6),d=o.n(f),v=o(7),b=o.n(v),w=o(2),y=o.n(w),h=o(8),x=o.n(h);var _=o(9),g=o.n(_),j=o(10),O=o.n(j),C=function(t){var e,o;function n(){return t.apply(this,arguments)||this}o=t,(e=n).prototype=Object.create(o.prototype),e.prototype.constructor=e,e.__proto__=o;var r=n.prototype;return r.oninit=function(e){t.prototype.oninit.call(this,e),this.discussion=this.attrs.discussion,this.currentViewsCount=this.attrs.discussion.views(),this.newViewsCount=O()(this.currentViewsCount)},r.content=function(){return m("div",{className:"Modal-body"},m("div",{className:"Form Form--centered"},m("div",{className:"Form-group"},m("label",null,app.translator.trans("flarumite-simple-discussion-views.forum.modal_resetviews.label")),m("input",{className:"FormControl",type:"number",min:"0",bidi:this.newViewsCount})),m("div",{className:"Form-group"},y.a.component({className:"Button Button--primary Button--block",type:"submit",loading:this.loading},app.translator.trans("flarumite-simple-discussion-views.forum.modal_resetviews.submit")))))},r.title=function(){return app.translator.trans("flarumite-simple-discussion-views.forum.modal_resetviews.title")},r.className=function(){return"Modal--small"},r.onsubmit=function(t){var e=this;t.preventDefault(),this.loading=!0;var o=parseInt(this.newViewsCount()),n=this.currentViewsCount;o>=0&&o!==n&&this.attrs.discussion.save({views:o}).then((function(){m.redraw.sync()})).catch((function(t){e.loading=!1,console.log(t)})),this.hide()},n}(g.a);r.a.initializers.add("flarumite-simple-discussion-views",(function(){Object(s.extend)(a.a.prototype,"sortMap",(function(t){t.popular="-view_count",t.unpopular="view_count"})),p.a.prototype.views=c.a.attribute("views"),p.a.prototype.canReset=c.a.attribute("canReset"),Object(s.extend)(d.a.prototype,"infoItems",(function(t){var e=this.attrs.discussion.views();t.add("discussion-views",m("span",null,b()(e)))})),Object(s.extend)(x.a,"moderationControls",(function(t,e){e.attribute("canReset")&&t.add("reset",m(y.a,{icon:"far fa-eye",onclick:function(){return app.modal.show(C,{discussion:e})}},app.translator.trans("flarumite-simple-discussion-views.forum.discussion_controls.resetviews_button")))}))}))}]);
//# sourceMappingURL=forum.js.map