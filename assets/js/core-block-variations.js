wp.blocks.registerBlockVariation(
	'core/group',
	{
		name: 'wide-group',
		title: 'Wide group',
        attributes: {'align':'wide','layout':{'inherit':true}},
        innerBlocks: [
			['core/group',
                {
                    'align':'wide',
                }]
		]
	}
);