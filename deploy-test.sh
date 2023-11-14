#!/bin/bash

IMAGE_NAME=pemirapolkesden2022
IMAGE_TAG=test
DEPLOY_NAME=pemirapolkesden2022test
docker pull ghcr.io/febrianram/$IMAGE_NAME:$IMAGE_TAG \
  && docker tag ghcr.io/febrianram/$IMAGE_NAME:$IMAGE_TAG asia-southeast1-docker.pkg.dev/dukung-calonmu-1537754150725/dukungcalonmu/$IMAGE_NAME:$IMAGE_TAG \
  && docker push asia-southeast1-docker.pkg.dev/dukung-calonmu-1537754150725/dukungcalonmu/$IMAGE_NAME:$IMAGE_TAG \
  && gcloud run deploy $DEPLOY_NAME --image=asia-southeast1-docker.pkg.dev/dukung-calonmu-1537754150725/dukungcalonmu/$IMAGE_NAME:$IMAGE_TAG