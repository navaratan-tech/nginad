<?php
/**
 * CDNPAL NGINAD Project
 *
 * @link http://www.nginad.com
 * @copyright Copyright (c) 2013-2015 CDNPAL Ltd. All Rights Reserved
 * @license GPLv3
 */

namespace _factory;

use Zend\Db\TableGateway\Feature;

class AdCampaignVideoRestrictions extends \_factory\CachedTableRead
{

	static protected $instance = null;

	public static function get_instance() {

		if (self::$instance == null):
			self::$instance = new \_factory\AdCampaignVideoRestrictions();
		endif;
		return self::$instance;
	}


    function __construct() {

            $this->table = 'AdCampaignVideoRestrictions';
            $this->featureSet = new Feature\FeatureSet();
            $this->featureSet->addFeature(new Feature\GlobalAdapterFeature());
            $this->initialize();
    }

    public function get_row($params = null) {
        // http://files.zend.com/help/Zend-Framework/zend.db.select.html

        $obj_list = array();

        $resultSet = $this->select(function (\Zend\Db\Sql\Select $select) use ($params) {
        	foreach ($params as $name => $value):
        	$select->where(
        			$select->where->equalTo($name, $value)
        	);
        	endforeach;
        	$select->limit(1, 0);
        	$select->order('AdCampaignVideoRestrictionsID');

        }
        	);

    	    foreach ($resultSet as $obj):
    	         return $obj;
    	    endforeach;

        	return null;
    }

    public function get($params = null) {
        	// http://files.zend.com/help/Zend-Framework/zend.db.select.html

        $obj_list = array();

    	$resultSet = $this->select(function (\Zend\Db\Sql\Select $select) use ($params) {
        		foreach ($params as $name => $value):
        		$select->where(
        				$select->where->equalTo($name, $value)
        		);
        		endforeach;
        		//$select->limit(10, 0);
        		$select->order('AdCampaignVideoRestrictionsID');

        	}
    	);

    	    foreach ($resultSet as $obj):
    	        $obj_list[] = $obj;
    	    endforeach;

    		return $obj_list;
    }
    
    public function saveAdCampaignVideoRestrictions(\model\AdCampaignVideoRestrictions $VideoRestrictions) {
    	$data = array( 
    			'AdCampaignBannerID'               => $VideoRestrictions->AdCampaignBannerID,
    	        'GeoCountry'                       => $VideoRestrictions->GeoCountry,
    	        'GeoState'                         => $VideoRestrictions->GeoState,
    	        'GeoCity'                          => $VideoRestrictions->GeoCity,
    	        'MimesCommaSeparated'              => $VideoRestrictions->MimesCommaSeparated,
    			'MinDuration'              		   => $VideoRestrictions->MinDuration,
    			'MaxDuration'              		   => $VideoRestrictions->MaxDuration,
    			'ApisSupportedCommaSeparated'  	   => $VideoRestrictions->ApisSupportedCommaSeparated,
    			'ProtocolsCommaSeparated'          => $VideoRestrictions->ProtocolsCommaSeparated,
    			'DeliveryCommaSeparated'           => $VideoRestrictions->DeliveryCommaSeparated,
    			'PlaybackCommaSeparated'           => $VideoRestrictions->PlaybackCommaSeparated,
    			'StartDelay'              		   => $VideoRestrictions->StartDelay,
    			'Linearity'              		   => $VideoRestrictions->Linearity,
    			'FoldPos'              		   	   => $VideoRestrictions->FoldPos,
    			'MinHeight'              		   => $VideoRestrictions->MinHeight,
    			'MinWidth'              		   => $VideoRestrictions->MinWidth,
    			'PmpEnable'              		   => $VideoRestrictions->PmpEnable,
    			'Secure'              		   	   => $VideoRestrictions->Secure,
    			'Optout'              		   	   => $VideoRestrictions->Optout,
    	        'Vertical'                         => $VideoRestrictions->Vertical,
    			'DateCreated'                      => $VideoRestrictions->DateCreated
    	);

    	$video_id = $VideoRestrictions->AdCampaignBannerID;
		$params = array();
		$params["AdCampaignBannerID"] = $video_id;
    	$_video_restrictions = $this->get_row($params);

    	$video_restrictions_id = (int)$VideoRestrictions->AdCampaignVideoRestrictionsID;
    	if ($video_restrictions_id === 0 && $_video_restrictions === null): 
    		$this->insert($data);
    	else: 
    		if ($video_restrictions_id === 0):
    			$video_restrictions_id = $_video_restrictions->AdCampaignVideoRestrictionsID;
    		endif;
    		$this->update($data, array('AdCampaignVideoRestrictionsID' => $video_restrictions_id));
    	endif;
    }

    public function deleteAdCampaignVideoRestrictions($banner_id) {
    	$this->delete(array('AdCampaignBannerID' => $banner_id));
    }

};
