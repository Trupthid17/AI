import os
import requests
from config import GROQ_API_KEY, MODEL_NAME


def retrieve_top_documents(query: str, store, top_k=3):
    from utils.embeddings import MODEL
    query_embedding = MODEL.encode([query])[0]
    return store.search(query_embedding, top_k=top_k)


def answer_question(question: str, store):
    context_docs = retrieve_top_documents(question, store, top_k=3)
    context = "\n\n".join(context_docs)

    payload = {
        "model": MODEL_NAME,
        "messages": [
            {
                "role": "system",
                "content": "You are a helpful assistant that answers strictly from the provided context. If the answer is not in the context, say so."
            },
            {
                "role": "user",
                "content": f"Context:\n{context}\n\nQuestion:\n{question}"
            }
        ],
        "temperature": 0.2,
    }

    headers = {
        "Authorization": f"Bearer {GROQ_API_KEY}",
        "Content-Type": "application/json",
    }

    response = requests.post(
        "https://api.groq.com/openai/v1/chat/completions",
        headers=headers,
        json=payload,
        timeout=60,
    )

    response.raise_for_status()
    data = response.json()
    answer = data["choices"][0]["message"]["content"]
    return answer, context_docs
