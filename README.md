# test-cosmos

How to use.

docker run -i -t rioriost/test-cosmos -e COSMOS_URI="https://REPLACEHERE.documents.azure.com:443", COSMOS_KEY="PrimaryOrSecondaryKey==", DB_ID="test_db", COL_ID="test_collection"

Actual example with READ-ONLY KEY

docker run -i -t rioriost/test-cosmos -e COSMOS_URI="https://riotestcosmosdbcore.documents.azure.com:443", COSMOS_KEY="U5em9XaREn9PreSbnDfHKW7x0dZPwhrSq3g435ptQVhqDEWa3VJOkjNIhXoBYkEzmXR8QV4sRl2INXish25KBw==", DB_ID="salmonrun", COL_ID="jobs"

Actual example with READ-ONLY KEY on Azure Container Instances
$ az group create -l japaneast -g testacirg
$ az container create -g testacirg -n testacicnt1 --image rioriost/test-cosmos -e COSMOS_URI="https://riotestcosmosdbcore.documents.azure.com:443", COSMOS_KEY="U5em9XaREn9PreSbnDfHKW7x0dZPwhrSq3g435ptQVhqDEWa3VJOkjNIhXoBYkEzmXR8QV4sRl2INXish25KBw==", DB_ID="salmonrun", COL_ID="jobs"
