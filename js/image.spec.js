import Image from './image';

const imageHtml = '<img src="foo.jpg"></img>';

describe('Image', () => {
  let image;

  beforeEach(() => {
    document.body.innerHTML = imageHtml;
    image = document.querySelector('img');
  });

  it('Should initialize', () => {
    const img = new Image(image);
    expect(img).toBeInstanceOf(Image);
  });

  it('Should store a reference to the image element', () => {
    const img = new Image(image);
    expect(img.image).toBe(image);
  });

  test('fadeIn should set the element opacity to 0', () => {
    const img = new Image(image);
    img.fadeIn();
    expect(img.image.style.opacity).toBe('0');
  });

  test('showImage should set the element opacity to 1', () => {
    const img = new Image(image);
    img.showImage();
    expect(img.image.style.opacity).toBe('1');
  });
});

