def build_caption_prompt():
    return "Generate a concise but descriptive caption for this image."


def build_vqa_prompt(question: str):
    return f"Answer this question about the image: {question}"
