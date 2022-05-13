class HTTPHeaders {
    static postHeaders(token) {
        let headers = {
            headers: {
                Accept: "application/json",
                "Content-Type": "multipart/form-data",
            },
            "X-CSRF-TOKEN": token,
        };

        return headers;
    }
}

export default HTTPHeaders;
