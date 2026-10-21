from sentence_transformers import SentenceTransformer

MODEL = SentenceTransformer('all-MiniLM-L6-v2')


def embed_texts(texts):
    if not texts:
        return []
    return MODEL.encode(texts, convert_to_numpy=True)
