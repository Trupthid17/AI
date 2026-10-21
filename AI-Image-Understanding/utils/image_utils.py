from PIL import Image


def validate_image(image: Image.Image) -> bool:
    try:
        image.verify()
        return True
    except Exception:
        return False


def display_image(image: Image.Image):
    return image
