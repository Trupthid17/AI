import io
from pypdf import PdfReader


def extract_pdf_text(file_bytes: bytes) -> str:
    pdf_reader = PdfReader(io.BytesIO(file_bytes))
    pages = []
    for page in pdf_reader.pages:
        text = page.extract_text() or ""
        pages.append(text)
    return "\n\n".join(pages)
