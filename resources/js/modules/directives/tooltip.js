import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';

/**
 * @param Alpine
 */
export default function(Alpine) {
  /**
   * @param el {HTMLElement}
   * @param expression {String}
   */
  Alpine.directive('tooltip', (el, {expression}) => {
    tippy(el, {
      content: expression,
      placement: el.dataset.position ?? 'top',
      duration: 0,
      allowHTML: true,
    });
  });
}
