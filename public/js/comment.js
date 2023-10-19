<script>
    function checkCommentInput(textarea) {
        var commentSubmitButton = document.getElementById('commentSubmitButton');
        if (textarea.value.trim() !== '') {
            commentSubmitButton.style.display = 'block';
        } else {
            commentSubmitButton.style.display = 'none';
        }
    }

    function validateComment() {
        var commentText = document.querySelector('textarea[name="body"]').value;
        
        if (commentText.trim() === '') {
            // コメントが空の場合にアラートメッセージを表示
            alert('コメントを入力してください。');
            return false; // フォームの送信を中止
        }
        
        // コメントが入力されている場合はフォームを送信
        return true;
    }
</script>
