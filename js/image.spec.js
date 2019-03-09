import Image from "./image";

const imageHtml = `
<img class="image" src="foo.jpg"></img>
<img class="disabled-image" data-load-transition="false" src="foo.jpg"></img>
`;

describe("Image", () => {
  let image;
  let disabledImage;

  beforeEach(() => {
    document.body.innerHTML = imageHtml;
    image = document.querySelector(".image");
    disabledImage = document.querySelector(".disabled-image");
  });

  it("Should initialize", () => {
    const img = new Image(image);
    expect(img).toBeInstanceOf(Image);
  });

  it("Should store a reference to the image element", () => {
    const img = new Image(image);
    expect(img.image).toBe(image);
  });

  test("fadeIn should set the element opacity to 1", () => {
    const img = new Image(image);
    img.fadeIn();
    expect(img.image.style.opacity).toBe("1");
  });

  test("start should set the element opacity to 0", () => {
    const img = new Image(image);
    img.start();
    expect(img.image.style.opacity).toBe("0");
  });

  test("start should call fadeIn when image has already loaded", () => {
    const img = new Image(image);
    img.fadeIn = jest.fn();
    Object.defineProperty(img.image, "complete", {
      value: true,
      writable: false,
    });
    img.start();
    expect(img.fadeIn).toHaveBeenCalledTimes(1);
  });

  test("start should call attachLoadedEvent if image has not yet loaded", () => {
    const img = new Image(image);
    img.attachLoadedEvent = jest.fn();
    Object.defineProperty(img.image, "complete", {
      value: false,
      writable: false,
    });
    img.start();
    expect(img.attachLoadedEvent).toHaveBeenCalledTimes(1);
  });

  test("start should do nothing if data-load-transition=false", () => {
    const img = new Image(disabledImage);
    img.attachLoadedEvent = jest.fn();
    img.start();
    expect(img.attachLoadedEvent).toHaveBeenCalledTimes(0);
  });
});
