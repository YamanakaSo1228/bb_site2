document.addEventListener('DOMContentLoaded', function() {
    const $inning = $('#inning');
    const $conceded_points = $('#conceded_points');
    const $fraction = $('#fraction');

        // 投球回数の変更時に防御率を計算して表示する
        // 投球回数の変更時に防御率を計算して表示する
    $inning.add($fraction).add($conceded_points).on('change', function() {
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

    // 打率の値が変更されたら打率を計算して表示する
    $at_bats.add($hit).on('input', function() {
        const at_batsValue = parseInt($at_bats.val(), 10);
        const hitValue = parseInt($hit.val(), 10);
        if (isNaN(at_batsValue) || isNaN(hitValue) || at_batsValue === 0) {
            // 打席数または安打数が数値でない、または打席数が0の場合は打率を空にする
            $('#avg').val('');
        } else {
            // 打席数と安打数から打率を計算して表示する
            const avgValue = (hitValue / at_batsValue).toFixed(3);
            $('#avg').val(avgValue);
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
    $at_bats.add($hit).add($walks).add($sacrifice_hits).add($sacrifice_flies).on('input', function() {
        const at_batsValue = parseInt($at_bats.val(), 10);
        const hitValue = parseInt($hit.val(), 10);
        const walksValue = parseInt($walks.val(), 10);
        const sacrificeHitsValue = parseInt($sacrifice_hits.val(), 10);
        const sacrificeFliesValue = parseInt($sacrifice_flies.val(), 10);
        
        if (isNaN(at_batsValue) || isNaN(hitValue) || isNaN(walksValue) || isNaN(sacrificeHitsValue) || isNaN(sacrificeFliesValue) || at_batsValue === 0) {
            // 打数、安打数、四球、犠打、犠飛のいずれかが数値でない、または打数が0の場合は出塁率を空にする
            $('#base_avg').val('');
        } else {
            // 出塁率を計算して表示する
            const onBasePercentage = ((hitValue + walksValue + sacrificeHitsValue + sacrificeFliesValue) / (at_batsValue + walksValue + sacrificeHitsValue + sacrificeFliesValue)).toFixed(3);
            $('#base_avg').val(onBasePercentage);
        }
    });


    // 打率と長打率が変更された時にOPSを再計算する
    $at_bats.add($hit).add($walks).add($sacrifice_hits).add($sacrifice_flies).add($hit).add($doubles).add($triples).add($homeRun).on('input', function() {
        const long_avgValue = parseFloat($('#long_avg').val());
        const avgValue = parseFloat($('#avg').val());

        if (!isNaN(long_avgValue) && !isNaN(avgValue) && long_avgValue !== 0) {
            // 打率と長打率が数値である場合、OPSを計算してフィールドに設定する
            const opsValue = (long_avgValue + avgValue).toFixed(3);
            $('#ops').val(opsValue);
        } else {
            // 条件に該当しない場合はOPSフィールドを空にする
            $('#ops').val('');
        }
    });



});
