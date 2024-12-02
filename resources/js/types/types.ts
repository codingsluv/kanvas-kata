export interface BlogPost {
    id: number;
    title: string;
    content: string;
    image: string;
}

export interface FormData {
    title: string;
    content: string;
    image: File | null;
}
