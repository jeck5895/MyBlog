base32 = new Nibbler({
    dataBits: 8,
    codeBits: 5,
    keyString: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567',
    pad: '='
});

localStorage.setItem("cahera-default-image", "data:image/png;base64,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");