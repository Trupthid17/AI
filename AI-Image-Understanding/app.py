import os
from dotenv import load_dotenv
import streamlit as st
from PIL import Image

from utils.image_utils import display_image, validate_image
from utils.prompts import build_caption_prompt, build_vqa_prompt
from utils.vision_api import generate_caption, answer_question

load_dotenv()

st.title("AI Image Understanding and Caption Generator")

uploaded_file = st.file_uploader("Upload an image", type=['png', 'jpg', 'jpeg'])
if uploaded_file is not None:
    image = Image.open(uploaded_file)
    if validate_image(image):
        st.image(image, caption="Uploaded Image", use_column_width=True)

        caption = generate_caption(image)
        st.markdown("### Caption")
        st.write(caption)

        question = st.text_input("Ask a question about the image")
        if question:
            answer = answer_question(image, question)
            st.markdown("### Answer")
            st.write(answer)
    else:
        st.error("The uploaded image is invalid or unreadable.")
