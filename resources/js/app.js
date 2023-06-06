import './bootstrap';

const modal = document.querySelector(".modalcontainer");
const overlay = document.querySelector(".overlay");
const openModalBtn = document.querySelector(".btn-open");
const closeModalBtn = document.querySelector("#btn-close");
const deletelink = document.querySelector('.deletelink');
const projecttitleEl = document.querySelector(".projecttitle");

const slugify = str =>
    str
    .toLowerCase()
    .trim()
    .replace(/[^\w\s-]/g, '')
    .replace(/[\s_-]+/g, '-')
    .replace(/^-+|-+$/g, '');

const openModal = function (e) {
    const projectTitle = e.target.closest('.useractions').previousElementSibling.children[0].innerHTML;
    projecttitleEl.innerHTML = projectTitle;
    deletelink.href = '/delete/' + slugify(projectTitle)
    modal.classList.remove("hidden");
    overlay.classList.remove("hidden");
};

const closeModal = function () {
    modal.classList.add("hidden");
    overlay.classList.add("hidden");
};

if (overlay || closeModalBtn || openModalBtn) {
    overlay.addEventListener("click", closeModal);
    closeModalBtn.addEventListener("click", closeModal);
    openModalBtn.addEventListener("click", openModal);
}
