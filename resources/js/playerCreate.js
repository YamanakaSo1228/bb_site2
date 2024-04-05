document.addEventListener('DOMContentLoaded', function() {
    $(document).ready(function() {
        // ページ読み込み時にフォームを読み込み専用に設定する
        $('#avg').prop('readonly', true);
        $('#era').prop('readonly', true);
        $('#long_avg').prop('readonly', true);
        $('#ops').prop('readonly', true);
        $('#base_avg').prop('readonly', true);
        $('#winning_percentage').prop('readonly', true);
        $('#total_hit').prop('readonly', true);
        
        // フォームがクリックされたときにアラートを表示する
        $('#avg').on('click', function() {
            alert('このフィールドは編集できません。');
        });
    });

    const $inning = $('#inning');
    const $conceded_points = $('#conceded_points');
    const $fraction = $('#fraction');

    // 投球回数の変更時に防御率を計算して表示する
    $inning.add($fraction).add($conceded_points).on('input', function() {
        const inningValue = parseFloat($inning.val()) + parseFloat(eval($fraction.val()));
        const concededPointsValue = parseInt($('#conceded_points').val(), 10);
        
        console.log("Inning Value:", inningValue);
        console.log("Conceded Points Value:", concededPointsValue);
    
        let eraValue = '';
        
        // イニング数と失点数がどちらも数値であるかチェック
        if (!isNaN(inningValue) && !isNaN(concededPointsValue)) {
            // 防御率の計算
            eraValue = (concededPointsValue / inningValue * 9).toFixed(3);
        }
    
        console.log("ERA Value:", eraValue);
        
        // 防御率を表示
        $('#era').val(eraValue);
    });
        
        

    // 打席数と安打数のinput要素を取得
    const $at_bats = $('#at_bats');
    const $hit = $('#hit');
    const $walks = $('#walks');
    const $sacrifice_hits = $('#sacrifice_hits');
    const $sacrifice_flies = $('#sacrifice_flies');
    const $doubles = $('#doubles'); // 二塁打数
    const $triples = $('#triples'); // 三塁打数
    const $homeRun = $('#home_run'); // 本塁打数
    const $long_avg = $('#long_avg'); // 長打率
    const $avg = $('#avg'); // 打率
    const $base_avg = $('#base_avg'); // 出塁率
    // 勝利数の入力要素を取得
    const $wins = $('#wins');
    const $losses = $('#losses');
    const $winningPercentage = $('#winning_percentage'); // 勝率の表示要素を取得

    $at_bats.add($hit).add($doubles).add($triples).add($homeRun).on('input', function() {
        // 各入力値を取得する
        const at_batsValue = parseInt($at_bats.val(), 10); // 打数
        const singlesValue = parseInt($hit.val(), 10); // 単打数
        const doublesValue = parseInt($doubles.val(), 10); // 二塁打数
        const triplesValue = parseInt($triples.val(), 10); // 三塁打数
        const homeRunValue = parseInt($homeRun.val(), 10); // 本塁打数
    
        // 入力値が有効かどうかをチェックする
        if (isNaN(at_batsValue) || isNaN(singlesValue) || isNaN(doublesValue) || isNaN(triplesValue) || isNaN(homeRunValue) || at_batsValue === 0) {
            // 入力値が無効な場合、打率を空にする
            $('#avg').val('');
        } else {
            // 安打数を計算する
            const hitValue = singlesValue + doublesValue + triplesValue + homeRunValue;
    
            // 打率を計算して表示する
            const avg = (hitValue / at_batsValue).toFixed(3);
            $('#avg').val(avg);
        }
    });

    // 安打数初期表示用
    $(document).ready(function() {
        // 各打撃成績の値を取得する
        const singlesValue = parseInt($('#hit').val(), 10) || 0; // 単打数
        const doublesValue = parseInt($('#doubles').val(), 10) || 0; // 二塁打数
        const triplesValue = parseInt($('#triples').val(), 10) || 0; // 三塁打数
        const homeRunValue = parseInt($('#home_run').val(), 10) || 0; // 本塁打数
    
        // 合計安打数を計算する
        const totalHit = singlesValue + doublesValue + triplesValue + homeRunValue;
    
        // 合計安打数を表示する
        $('#total_hit').val(totalHit);
    });
    // 各入力フィールドの値を取得する
    const $totalHit = $('#total_hit');
    // 合計安打数計算
    $hit.add($doubles).add($triples).add($homeRun).on('input', function() {
        // 各打撃成績の値を取得する
        const singlesValue = parseInt($hit.val(), 10) || 0; // 単打数
        const doublesValue = parseInt($doubles.val(), 10) || 0; // 二塁打数
        const triplesValue = parseInt($triples.val(), 10) || 0; // 三塁打数
        const homeRunValue = parseInt($homeRun.val(), 10) || 0; // 本塁打数

        // 合計安打数を計算する
        const totalHit = singlesValue + doublesValue + triplesValue + homeRunValue;

        // 合計安打数を表示する
        $totalHit.val(totalHit);
    });

    // 勝率の自動計算
    $wins.add($losses).on('input', function() {
        // 勝利数と敗北数を取得
        const winsValue = parseInt($wins.val(), 10);
        const lossesValue = parseInt($losses.val(), 10);

        // 入力値が有効かどうかをチェックする
        if (isNaN(winsValue) || isNaN(lossesValue) || winsValue < 0 || lossesValue < 0) {
            // 勝利数または敗北数が無効な場合、勝率を空にする
            $winningPercentage.val('');
        } else {
            // 勝率を計算して表示する
            const totalGames = winsValue + lossesValue;
            const winningPercentage = (winsValue / totalGames).toFixed(3);
            $winningPercentage.val(winningPercentage);
        }
    });



    // 長打率の計算
    $at_bats.add($hit).add($doubles).add($triples).add($homeRun).on('input', function() {
        // 各入力値を取得する
        const at_batsValue = parseInt($at_bats.val(), 10); // 打数
        const singlesValue = parseInt($hit.val(), 10); // 単打数
        const doublesValue = parseInt($doubles.val(), 10); // 二塁打数
        const triplesValue = parseInt($triples.val(), 10); // 三塁打数
        const homeRunValue = parseInt($homeRun.val(), 10); // 本塁打数

        // 入力値が有効かどうかをチェックする
        if (isNaN(at_batsValue) || isNaN(singlesValue) || isNaN(doublesValue) || isNaN(triplesValue) || isNaN(homeRunValue) || at_batsValue === 0) {
            // 入力値が無効な場合、長打率を空にする
            $('#long_avg').val('');
        } else {
            // 合計塁打数を計算する
            const totalBases = singlesValue + doublesValue * 2 + triplesValue * 3 + homeRunValue * 4;

            // 長打率を計算して表示する
            const long_avg = (totalBases / at_batsValue).toFixed(3);
            $('#long_avg').val(long_avg);
        }
    });

    // 出塁率の計算
    $at_bats.add($hit).add($doubles).add($triples).add($homeRun).add($walks).add($sacrifice_hits).add($sacrifice_flies).on('input', function() {
        const at_batsValue = parseInt($at_bats.val(), 10);
        const singlesValue = parseInt($hit.val(), 10); // 単打数
        const doublesValue = parseInt($doubles.val(), 10); // 二塁打数
        const triplesValue = parseInt($triples.val(), 10); // 三塁打数
        const homeRunValue = parseInt($homeRun.val(), 10); // 本塁打数
        const walksValue = parseInt($walks.val(), 10);
        const sacrificeHitsValue = parseInt($sacrifice_hits.val(), 10);
        const sacrificeFliesValue = parseInt($sacrifice_flies.val(), 10);
        
        if (isNaN(at_batsValue) || isNaN(singlesValue) || isNaN(doublesValue) || isNaN(triplesValue) || isNaN(homeRunValue) || isNaN(walksValue) || isNaN(sacrificeHitsValue) || isNaN(sacrificeFliesValue) || at_batsValue === 0) {
            // 打数、単打数、二塁打数、三塁打数、本塁打数、四球、犠打、犠飛のいずれかが数値でない、または打数が0の場合は出塁率を空にする
            $('#base_avg').val('');
        } else {
            // 出塁率を計算して表示する
            const onBasePercentage = ((singlesValue + doublesValue + triplesValue + homeRunValue + walksValue + sacrificeHitsValue + sacrificeFliesValue) / (at_batsValue + walksValue + sacrificeHitsValue + sacrificeFliesValue)).toFixed(3);
            $('#base_avg').val(onBasePercentage);
        }
    });
    


    // 打率と長打率が変更された時にOPSを再計算する
    $at_bats.add($hit).add($walks).add($sacrifice_hits).add($sacrifice_flies).add($hit).add($doubles).add($triples).add($base_avg).add($long_avg).on('input', function() {
        const long_avgValue = parseFloat($('#long_avg').val());
        const base_avgValue = parseFloat($('#base_avg').val()); 

        if (!isNaN(long_avgValue) && !isNaN(base_avgValue) && long_avgValue !== 0) {
            // 打率と長打率が数値である場合、OPSを計算してフィールドに設定する
            const opsValue = (long_avgValue + base_avgValue).toFixed(3);
            console.log("Ops Value:", opsValue);
            $('#ops').val(opsValue);
        } else {
            // 条件に該当しない場合はOPSフィールドを空にする
            $('#ops').val('');
        }
    });

    



});
