<?php

namespace App\Http\Entity;

use Illuminate\Support\Facades\Log;

class PutCsv {
    public function putCsv($data) {
        $file_name='AttendanceList-' . date("Y/m/d H:i:s") . '.csv';

        $fp = fopen('php://output', 'w');

        // タイトルを追加
        $header = [
            'ユーザーID',
            '姓',
            '名',
            'セイ',
            'メイ',
            'メールアドレス',
            '電話番号',
            '出欠（1=出席、0=欠席）',
            'アレルギー',
            'その他注意点',
            'メッセージ',
        ];
        fputcsv($fp, $header, ',', '"');

        foreach ($data as $row) {
            fputcsv($fp, (array)$row, ',', '"');
        }
        fclose($fp);
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename={$file_name}");
        header('Content-Transfer-Encoding: binary');
        exit;
    }
}