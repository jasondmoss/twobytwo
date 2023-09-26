/**
 * 'Two By Two' Scripts.
 */

/**
 * Has (Object|Node) been defined? Does (Object|Node) exist?
 *
 * @param {Node} thing Element to test.
 * @return {Boolean} True or false
 * @method exists
 */
function exists(thing)
{
    "use strict";

    return ! (typeof thing === "undefined" ||
        thing === null ||
        thing === false ||
        thing.length < 1);
}


/**
 * Securely open a new window from given anchor element.
 *
 * @param {Node} anchor
 * @method newWindowAnchor
 */
function newWindowAnchor(anchor)
{
    "use strict";

    if (! exists(anchor)) {
        return false;
    }

    anchor.setAttribute("rel", "noopener noreferrer");
    anchor.addEventListener("click", (event) => {
        event.preventDefault();

        let targetUrl = anchor.getAttribute("href");
        let newWindow = window.open(targetUrl, "_blank");

        /**
         * Sever the reference of the new tab/window from the parent.
         *
         * @see https://developer.mozilla.org/en-US/docs/Web/API/Window/opener
         */
        newWindow.opener = null;
    });
}


(function () {
    window.addEventListener("load", () => {
        "use strict";

        /**
         * 'Two By Two' settings link.
         *
         * @type {HTMLElement} settingsLink
         * @uses {Method} newWindowAnchor
         */
        let settingsLink = document.querySelector(".path-twobytwo .settings-link");
        if (exists(settingsLink)) {
            settingsLink.style.display = "flex";
            settingsLink.style.alignItems = "center";
            settingsLink.style.gap = "0 1rem";

            newWindowAnchor(settingsLink);
        }

    });
})();
