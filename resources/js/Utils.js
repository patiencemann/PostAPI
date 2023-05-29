/**
 * Push new params in url
 *
 * @param {String} key
 * @param {String} value
 */
export const urlPushState = (key, value) => {
    const url = new URL(window.location.href);
        url.searchParams.set(key, value);

    window.history.pushState(null, null, url);
}

/**
 * remove params in url
 *
 * @param {String} key
 */
export const urlRemoveState = (key) => {
    const url = new URL(window.location.href);
        url.searchParams.delete(key);
        
    window.history.pushState(null, null, url);
}
