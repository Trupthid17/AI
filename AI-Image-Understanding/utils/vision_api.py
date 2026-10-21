import base64
import io
import os
import requests
from dotenv import load_dotenv

from utils.prompts import build_caption_prompt, build_vqa_prompt

load_dotenv()

VISION_API_KEY = os.getenv("VLM_API_KEY", "")


def image_to_base64(image):
    buffered = io.BytesIO()
    image.save(buffered, format='PNG')
    return base64.b64encode(buffered.getvalue()).decode('utf-8')


def generate_caption(image):
    payload = {
        "model": "llama-3.2-11b-vision-instruct",
        "messages": [
            {"role": "user", "content": [
                {"type": "text", "text": build_caption_prompt()},
                {"type": "image_url", "image_url": {"url": f"data:image/png;base64,{image_to_base64(image)}"}}
            ]}
        ]
    }

    headers = {
        "Authorization": f"Bearer {VISION_API_KEY}",
        "Content-Type": "application/json",
    }

    response = requests.post(
        "https://api.groq.com/openai/v1/chat/completions",
        headers=headers,
        json=payload,
        timeout=60,
    )

    if response.status_code != 200:
        return "Caption generation failed. Please check the API key and model availability."

    data = response.json()
    return data["choices"][0]["message"]["content"]


def answer_question(image, question: str):
    payload = {
        "model": "llama-3.2-11b-vision-instruct",
        "messages": [
            {"role": "user", "content": [
                {"type": "text", "text": build_vqa_prompt(question)},
                {"type": "image_url", "image_url": {"url": f"data:image/png;base64,{image_to_base64(image)}"}}
            ]}
        ]
    }

    headers = {
        "Authorization": f"Bearer {VISION_API_KEY}",
        "Content-Type": "application/json",
    }

    response = requests.post(
        "https://api.groq.com/openai/v1/chat/completions",
        headers=headers,
        json=payload,
        timeout=60,
    )

    if response.status_code != 200:
        return "Image question answering failed. Please verify your API configuration."

    data = response.json()
    return data["choices"][0]["message"]["content"]
