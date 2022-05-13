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

    static putHeaders(token) {
        let headers = {
            headers: {
                Accept: "application/json",
                "Content-Type": "application/x-www-form-urlencoded",
            },
            "X-CSRF-TOKEN": token,
        };

        return headers;
    }
}

export default HTTPHeaders;
