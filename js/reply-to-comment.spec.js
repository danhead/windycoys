import ReplyToComment from "./reply-to-comment";

const commentHtml = `
<div class="comment">
  <div class="comment__head">
    <div class="comment__avatar"></div>
    <div class="comment__metadata">
      <span class="comment__author">Mr Smith</span>
      <span class="comment__date">21st September, 2018 at 15:36</span>
    </div>
  </div>
  <div class="comment__body">This is a comment.</div>
  <div class="comment__foot">
    <a class="comment__reply" data-comment-author="Mr Smith" data-comment-id="1234" href="?replytocom=1234#respond">
      <span class="comment__reply-text">Reply</span>
    </a>
    <div class="comment__inline-reply"></div>
  </div>
</div>`;

const formHtml = `
<div class="comments__foot">
  <div id="respond" class="comment-respond">
    <h3 id="reply-title" class="comment-respond__title">
      <span class="comment-respond__title-text">
        Leave a Reply
      </span>
      <div class="comment-respond__cancel">
        <a rel="nofollow" id="cancel-comment-reply-link" href="#respond">Cancel reply</a>
      </div>
    </h3>
    <form action="/wp-comments-post.php" method="post" id="commentform" class="comment-respond__form">
      <p class="comment-respond__notes">Your email address will not be published.</p>
      <label class="comment-respond__label" for="comment">Comment</label>
      <textarea class="comment-respond__input" id="comment" name="comment" cols="25" rows="8" aria-required="true"></textarea>
      <div class="comment-respond__item">
        <label class="comment-respond__label" for="author">Name</label>
        <input class="comment-respond__input" id="author" name="author" type="text" value="" size="30">
      </div>
      <div class="comment-respond__item">
        <label class="comment-respond__label" for="email">Email</label>
        <input class="comment-respond__input id="email" name="email" type="text" value="" size="30">
      </div>
      <div class="comment-respond__item">
        <label class="comment-respond__label" for="url">Website</label>
        <input class="comment-respond__input" id="url" name="url" type="text" value="" size="30">
      </div>
      <p class="form-submit">
        <input name="submit" type="submit" id="submit" class="comment-respond__submit" value="Post Comment">
        <input type="hidden" name="comment_post_ID" value="2683" id="comment_post_ID">
        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
      </p>
      <p style="display: none;">
        <input type="hidden" id="akismet_comment_nonce" name="akismet_comment_nonce" value="123456789">
      </p>
      <input type="hidden" id="ak_js" name="ak_js" value="987654321">
    </form>
  </div>
</div>
`;

let comments;
let form;
let links;
let inlineReply;

beforeEach(() => {
  document.body.innerHTML = `${commentHtml}${formHtml}`;
  form = document.querySelector(".comments__foot");
  links = document.querySelectorAll(".comment__reply");
  inlineReply = document.querySelector(".comment__inline-reply");
  comments = new ReplyToComment({ form, links });
});

describe("ReplyToComment", () => {
  it("Should initialise", () => {
    expect(comments.form).toBeInstanceOf(HTMLDivElement);
    expect(comments.links).toBeInstanceOf(Array);
  });

  it("Should fail to initialise if form is missing", () => {
    expect(new ReplyToComment()).toEqual({});
  });

  it("Should fail to initialise if there are no links", () => {
    expect(
      new ReplyToComment({
        form: document.querySelector("#respond"),
      }),
    ).toEqual({});
    expect(
      new ReplyToComment({
        form: document.querySelector("#respond"),
        links: document.querySelectorAll(".no-links-here"),
      }),
    ).toEqual({});
  });

  it("Should remove the form from the DOM when a reply link is clicked", () => {
    const event = new Event("click");
    comments.handleLinkClick(event, links[0]);
    expect(form.innerHTML).toEqual("");
  });

  it("Should hide the link when it is clicked", () => {
    const event = new Event("click");
    comments.handleLinkClick(event, links[0]);
    expect(links[0].classList.contains("is-hidden")).toBe(true);
  });

  it("Should insert the form into the inline reply container", () => {
    comments.insertForm(inlineReply);
    const inlineForm = inlineReply.querySelectorAll("form");
    expect(inlineForm.length).toEqual(1);
  });

  it("Should update the comment_parent hidden element", () => {
    comments.insertForm(inlineReply, "123", "Mr Smith");
    const { value } = inlineReply.querySelector("#comment_parent");
    expect(value).toEqual("123");
  });

  it("Should add a cancel link to the inline form", () => {
    comments.insertForm(inlineReply);
    const el = inlineReply.querySelector("#cancel-comment-reply-link");
    expect(el.style.display).toEqual("inline-block");
  });

  it("Should restore the reply link when the cancel link is clicked", () => {
    const event = new Event("click");
    comments.insertForm(inlineReply);
    comments.handleCancelClick(event, inlineReply);
    expect(links[0].classList.contains("is-hidden")).toBe(false);
  });

  it("Should remove the inline form when the cancel link is clicked", () => {
    const event = new Event("click");
    comments.insertForm(inlineReply);
    comments.handleCancelClick(event, inlineReply);
    expect(inlineReply.innerHTML).toEqual("");
  });
});
