# AI Project Collection

This repository contains three AI-powered project ideas and starter implementations:

1. AI Interview Preparation System
   - HTML, CSS, JavaScript, PHP, MySQL, Groq API
   - Mock interview question generation, answer suggestions, user accounts, practice tracking

2. AI Document Q&A Assistant using RAG
   - Python, Streamlit, PDF processing, embeddings, vector database, LLM API
   - Upload PDFs, retrieve relevant passages, and ask grounded questions

3. AI Image Understanding and Caption Generator
   - Python, Streamlit, image processing, vision-language model API
   - Upload images, generate captions, and answer questions about visual content

## Repository structure

```text
AI/
├── README.md
├── AI-Interview-Preparation-System/
│   ├── README.md
│   ├── config/
│   │   └── db.php
│   ├── includes/
│   │   ├── db.php
│   │   └── auth.php
│   ├── api/
│   │   ├── generate_question.php
│   │   └── evaluate_answer.php
│   ├── index.php
│   ├── dashboard.php
│   ├── practice.php
│   └── database/
│       └── schema.sql
├── AI-Document-QA-RAG/
│   ├── README.md
│   ├── requirements.txt
│   ├── app.py
│   ├── config.py
│   ├── .env.example
│   └── utils/
│       ├── __init__.py
│       ├── pdf_loader.py
│       ├── chunker.py
│       ├── embeddings.py
│       ├── vector_store.py
│       └── rag.py
├── AI-Image-Understanding/
│   ├── README.md
│   ├── requirements.txt
│   ├── app.py
│   └── utils/
│       ├── __init__.py
│       ├── image_utils.py
│       ├── prompts.py
│       └── vision_api.py
└── .gitignore
```

## Setup instructions

### 1. Interview system
- Import `database/schema.sql` into MySQL
- Edit `config/db.php`
- Start a PHP server from the folder root

### 2. RAG document assistant
- Create a virtual environment
- Install dependencies: `pip install -r requirements.txt`
- Add your Groq/OpenAI key in `.env` or environment variables
- Run: `streamlit run app.py`

### 3. Image understanding app
- Install dependencies: `pip install -r requirements.txt`
- Add your vision model API key
- Run: `streamlit run app.py`

## Notes

This repository is intentionally structured as a portfolio-ready collection of AI product ideas with implementation-ready starter code.
