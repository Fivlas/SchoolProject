const moveToComments = (postId) => {
    var redirectUrl = "post.php?postId=" + encodeURIComponent(postId);
    window.location.href = redirectUrl;
}

const clearTag = () => {
    var urlParams = new URLSearchParams(window.location.search);
    urlParams.delete("tag");
    var updatedUrl = window.location.origin + window.location.pathname + '?' + urlParams.toString();
    window.location.href = updatedUrl;
}

const adminModeCheckbox = (checkbox) => {
    let isChecked = checkbox.checked;
    var url = new URL(window.location.href);
    url.searchParams.set('admin', isChecked);
    window.location.href = url.toString();
}


function autoResizeTextarea(textarea) {
    textarea.style.height = 'auto';
    textarea.style.height = (textarea.scrollHeight) + 'px';
}

var postElements = document.getElementsByClassName("post");

if (postElements.length > 0) {
    postElements[postElements.length - 1].removeAttribute("style");

    postElements[postElements.length - 1].style.borderBottom = "1px solid rgb(47, 51, 54)";
}

var postElements = document.getElementsByClassName("post");

if (postElements.length > 0) {
    postElements[postElements.length - 1].removeAttribute("style");

    postElements[postElements.length - 1].style.borderBottom = "1px solid rgb(47, 51, 54)";
}

const roundToMultipleOf5 = (number) => {
    return Math.round(number / 5) * 5 / 5;
}

const incrementPage = (count) => {
    var url = new URL(window.location.href);

    var currentPage = parseInt(url.searchParams.get('page')) || 1;
    if (currentPage < roundToMultipleOf5(count)) {
        var nextPage = currentPage + 1;
        url.searchParams.set('page', nextPage);
        window.location.href = url.toString();
    }

}

const decrementPage = () => {
    var url = new URL(window.location.href);

    var currentPage = parseInt(url.searchParams.get('page')) || 1;

    if (currentPage > 1) {
        var nextPage = currentPage - 1;
        url.searchParams.set('page', nextPage);

        window.location.href = url.toString();
    }

}