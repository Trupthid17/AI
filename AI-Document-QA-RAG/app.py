import os
from dotenv import load_dotenv
import streamlit as st

from utils.pdf_loader import extract_pdf_text
from utils.chunker import chunk_text
from utils.embeddings import embed_texts
from utils.vector_store import FAISSStore
from utils.rag import answer_question

load_dotenv()

st.title("AI Document Q&A Assistant")
st.subheader("Ask questions from uploaded PDFs")

uploaded_file = st.file_uploader("Upload a PDF", type=["pdf"])

if uploaded_file is not None:
    file_bytes = uploaded_file.read()
    text = extract_pdf_text(file_bytes)
    chunks = chunk_text(text)
    embeds = embed_texts(chunks)

    store = FAISSStore()
    store.add_documents(chunks, embeds)

    st.success(f"Processed {len(chunks)} text chunks from the document.")

    question = st.text_input("Ask a question about the document")
    if question:
        answer, sources = answer_question(question, store)
        st.markdown("### Answer")
        st.write(answer)
        st.markdown("### Relevant passages")
        for i, source in enumerate(sources, start=1):
            st.write(f"{i}. {source[:400]}")
