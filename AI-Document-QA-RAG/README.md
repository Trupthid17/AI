# AI Document Q&A Assistant using RAG

A Python project that lets users upload PDFs, extract relevant content, and ask questions grounded in the uploaded document.

## Tech Stack
- Python
- Streamlit
- PyPDF
- sentence-transformers / embeddings
- FAISS or Chroma
- Groq/OpenAI LLM API

## Features
- PDF upload
- Text extraction
- Chunking
- Embedding generation
- Vector search
- Retrieval-augmented answering
- Source-aware responses

## How it works
1. Upload PDF
2. Extract text from each page
3. Split into chunks
4. Embed each chunk
5. Store vectors in FAISS/Chroma
6. Query top relevant chunks
7. Send chunks as context to the LLM
8. Return answer with evidence

## Setup
```bash
pip install -r requirements.txt
streamlit run app.py
```

## Example prompts
- What are the key risks described in this document?
- Summarize the project goals.
- What action items were mentioned in the final section?

## Files
- `app.py` – main Streamlit app
- `config.py` – environment settings
- `utils/pdf_loader.py` – PDF extraction
- `utils/chunker.py` – text chunking
- `utils/embeddings.py` – embedding generation
- `utils/vector_store.py` – vector storage logic
- `utils/rag.py` – retrieval and answer generation
