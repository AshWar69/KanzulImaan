// (function ($) {
//     "use strict";
//     $.HSCore.components.HSQantityCounter = {
//         _baseConfig: {},
//         pageCollection: $(),
//         init: function (selector, config) {
//             this.collection =
//                 selector && $(selector).length ? $(selector) : $();
//             if (!$(selector).length) return;
//             this.config =
//                 config && $.isPlainObject(config)
//                     ? $.extend({}, this._baseConfig, config)
//                     : this._baseConfig;
//             this.config.itemSelector = selector;
//             this.initCountQty();
//             return this.pageCollection;
//         },
//         initCountQty: function () {
//             var $self = this,
//                 collection = $self.pageCollection;
//             this.collection.each(function (i, el) {
//                 var $this = $(el),
//                     $plus = $this.find(".js-plus"),
//                     $minus = $this.find(".js-minus"),
//                     $result = $this.find(".js-result"),
//                     resultVal = parseInt($result.val());
//                 $plus.on("click", function (e) {
//                     e.preventDefault();
//                     resultVal += 1;
//                     $result.val(resultVal);
//                 });
//                 $minus.on("click", function (e) {
//                     e.preventDefault();
//                     if (resultVal > 1) {
//                         resultVal -= 1;
//                         $result.val(resultVal);
//                     } else {
//                         return false;
//                     }
//                 });
//                 collection = collection.add($this);
//             });
//         },
//     };
// })(jQuery);
