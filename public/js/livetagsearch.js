$(document).ready(function () {
    $('#tagInput').on('input', function () {
        let input = $(this).val();
        $.ajax({
            url: '/search-tags',  // サーバーサイドのルート
            method: 'POST',
            data: { input: input },
            success: function (data) {
                // ライブサーチの結果を表示する処理
                // ここに検索結果を表示するコードを追加します
            }
        });
    });
});
