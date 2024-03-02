/*const categoryTitles = document.querySelectorAll('.category-title');
const allCategoryPosts = document.querySelectorAll('.all');

categoryTitles.forEach(title => {
    title.addEventListener('click', () => {
        filterPosts(title.getAttribute('id'));
    });
});

function filterPosts(categoryId) {
    changeActivePosition(categoryId);
    
    allCategoryPosts.forEach(post => {
        if (post.classList.contains(categoryId)) {
            post.style.display = "block";
        } else {
            post.style.display = "none";
        }
    });
}

function changeActivePosition(activeCategoryId) {
    categoryTitles.forEach(title => {
        title.classList.remove('active');
        if (title.getAttribute('id') === activeCategoryId) {
            title.classList.add('active');
        }
    });
}
*/
const categoryTitles = document.querySelectorAll('.category-title');
const allCategoryPosts = document.querySelectorAll('.all');

categoryTitles.forEach(title => {
    title.addEventListener('click', () => {
        filterPosts(title.getAttribute('id'));
    });
});

function filterPosts(categoryId) {
    changeActivePosition(categoryId);
    
    allCategoryPosts.forEach(post => {
        if (categoryId === 'all' || post.classList.contains(categoryId)) { // Check if the category matches or it's 'all'
            post.style.display = "block";
        } else {
            post.style.display = "none";
        }
    });
}

function changeActivePosition(activeCategoryId) {
    categoryTitles.forEach(title => {
        title.classList.remove('active');
        if (title.getAttribute('id') === activeCategoryId) {
            title.classList.add('active');
        }
    });
}

