export default class ReplyToComment {
  constructor(cfg = {}) {
    if (!cfg.form || cfg.form.className !== "comments__foot") {
      return false;
    }
    if (!cfg.links || cfg.links.length === 0) {
      return false;
    }
    this.form = cfg.form;
    this.backupForm = cfg.form.querySelector("#respond").cloneNode(true);
    this.links = Array.prototype.slice.call(cfg.links);
    this.links.forEach(link => {
      link.addEventListener("click", e => this.handleLinkClick(e, link));
    });
  }

  insertForm(container, id, author) {
    const form = this.backupForm.cloneNode(true);
    const cancel = form.querySelector("#cancel-comment-reply-link");
    form.querySelector(
      ".comment-respond__title-text",
    ).innerHTML = `Reply to ${author}`;
    form.querySelector("#submit").value = "Post reply";
    form.querySelector("#comment_parent").value = id;
    cancel.style.display = "inline-block";
    cancel.addEventListener("click", e => this.handleCancelClick(e, container));
    container.appendChild(form);
  }

  handleCancelClick(e, container) {
    e.preventDefault();
    container.parentNode
      .querySelector(".comment__reply")
      .classList.remove("is-hidden");
    while (container.firstChild) {
      container.removeChild(container.firstChild);
    }
    this.form.appendChild(this.backupForm);
  }

  handleLinkClick(e, link) {
    e.preventDefault();
    link.classList.add("is-hidden");
    while (this.form.firstChild) {
      this.form.removeChild(this.form.firstChild);
    }
    const container = link.parentNode.querySelector(".comment__inline-reply");
    const { commentId, commentAuthor } = link.dataset;
    this.insertForm(container, commentId, commentAuthor);
  }
}
