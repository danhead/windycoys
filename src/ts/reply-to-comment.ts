export class ReplyToComment {
  clonedForm: HTMLDivElement;
  form: HTMLDivElement;
  links: HTMLLinkElement[];

  constructor() {
    this.form = document.querySelector("#respond") as HTMLDivElement;
    if (this.form) {
      this.links = Array.from(
        document.querySelectorAll(".comment__reply")
      ) as HTMLLinkElement[];
      this.clonedForm = this.form.cloneNode(true) as HTMLDivElement;

      if (this.links.length > 0) {
        this.attachEvents();
      }
    }
  }

  attachEvents(): void {
    this.links.forEach((link) => {
      link.addEventListener("click", (e) => this.handleLinkClick(e, link));
    });
  }

  handleLinkClick(e: Event, link: HTMLLinkElement): void {
    e.preventDefault();
    link.classList.add("is-hidden");
    this.form.style.display = "none";
    const targetNode = link.parentNode.querySelector(
      ".comment__inline-reply"
    ) as HTMLDivElement;
    const { commentId, commentAuthor } = link.dataset;
    this.insertForm(targetNode, commentId, commentAuthor);
  }

  insertForm(
    targetNode: HTMLDivElement,
    commentId: string,
    commentAuthor: string
  ): void {
    const clonedForm = this.clonedForm.cloneNode(true) as HTMLDivElement;
    const cancel = clonedForm.querySelector(
      "#cancel-comment-reply-link"
    ) as HTMLLinkElement;
    const submit = clonedForm.querySelector("#submit") as HTMLInputElement;
    const commentParent = clonedForm.querySelector(
      "#comment_parent"
    ) as HTMLInputElement;
    clonedForm.querySelector(
      ".comment-respond__title-text"
    ).innerHTML = `Reply to ${commentAuthor}`;
    submit.value = "Post reply";
    commentParent.value = commentId;
    targetNode.appendChild(clonedForm);
    cancel.style.display = "inline-block";
    cancel.addEventListener("click", (e) =>
      this.handleCancelClick(e, targetNode)
    );
  }

  handleCancelClick(e: Event, container: HTMLDivElement) {
    e.preventDefault();
    container.parentNode
      .querySelector(".comment__reply")
      .classList.remove("is-hidden");
    while (container.firstChild) {
      container.removeChild(container.firstChild);
    }
    this.form.style.display = "block";
  }
}
