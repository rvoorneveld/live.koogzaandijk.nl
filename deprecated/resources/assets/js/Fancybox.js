jQuery('.js-score-create').click(function(){
    let teamName = jQuery(this).attr('data-team-name');
    jQuery.fancybox.open({
        src: '/score/create',
        type: 'ajax',
        opts: {
            caption: `Voeg score toe voor ${teamName}`,
            ajax: {
                settings: {
                    data: {
                        'matchId': jQuery(this).attr('data-match-id'),
                        'teamId': jQuery(this).attr('data-team-id'),
                        'teamName': teamName,
                        'teamType': jQuery(this).attr('data-team-type'),
                    }
                }
            },
            buttons : [
                'close'
            ],
        }
    });
});