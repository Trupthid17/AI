import numpy as np
import faiss


class FAISSStore:
    def __init__(self):
        self.documents = []
        self.index = None

    def add_documents(self, documents, embeddings):
        self.documents.extend(documents)
        vector_dim = embeddings.shape[1]
        self.index = faiss.IndexFlatL2(vector_dim)
        self.index.add(np.array(embeddings).astype('float32'))

    def search(self, query_embedding, top_k=3):
        if self.index is None:
            return []
        distances, indices = self.index.search(np.array([query_embedding]).astype('float32'), top_k)
        results = []
        for idx in indices[0]:
            if 0 <= idx < len(self.documents):
                results.append(self.documents[int(idx)])
        return results
